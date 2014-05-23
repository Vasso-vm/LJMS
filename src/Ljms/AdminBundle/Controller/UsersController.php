<?php

namespace Ljms\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ljms\CoreBundle\Form\UserType;
use Ljms\CoreBundle\Entity\AltContact;
use Symfony\Component\HttpFoundation\Response;
use Ljms\CoreBundle\Entity\Profile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Umbrellaweb\Bundle\UsefulAnnotationsBundle\Annotation\CsrfProtector;
use Ljms\CoreBundle\Component\Pagination\Pagination;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
    /**
     * UsersController - edit/delete operations for backend-users (admins)
     * @Route("admin/users")
     */
    class UsersController extends Controller
    {

    /**
     * @Route("", name="users_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $users=false;
        $pagination=false;
        $page = ($request->get('page')!==null) ? $request->get('page') : 1;
        $limit = ($request->get('limit')!==null) ? $request->get('limit') : 10;
        $filter['division'] = ($request->get('division')) ? $request->get('division') : 'all';
        $filter['status'] = ($request->get('status')) ? $request->get('status') : 'all';
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Profile')->findUsers($filter,$page,$limit);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination= new Pagination();
                $pagination=$pagination->generate($paginator,$page);
            }
            $users=$paginator->getQuery()->getResult();
        }
        return array (
            'users'=>$users,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
            'csrf' => $this->get('form.csrf_provider')->generateCsrfToken('delete_user')
        );
    }

    /**
     * @Route("/add", name="users_add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $profile = new Profile();
        $profile->setAltContact(new AltContact());
        $form = $this->createForm(new UserType(), $profile,array('validation_groups' => array('Profile','Add','Address','AltContact'),));
        $form->handleRequest($request);
        if ($form->isValid()){
            $password = $encoder->encodePassword($profile->getPassword(), $profile->getSalt());
            $profile->setPassword($password);
            $this->setRole($request->request->get('current_role'),$profile);
            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'New user has been added.');
            return $this->redirect($this->generateUrl('users_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView(),
        );
    }

    /**
     * @Route("/edit/{id}", name="users_edit")
     * @Template("LjmsAdminBundle:Users:add.html.twig")
     * @ParamConverter("profile", class="LjmsCoreBundle:Profile")
     */
    public function editAction(Request $request,$profile){
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $em=$this->getDoctrine()->getManager();
        $old_pass=$profile->getPassword();
        if (!$profile) {
            throw $this->createNotFoundException(
                'No profile found for id '.$profile->getId()
            );
        }
        $form = $this->createForm(new UserType(), $profile);
        $form->handleRequest($request);
        if ($form->isValid()){
            if ($profile->getPassword()!==null){
            $password = $encoder->encodePassword($profile->getPassword(), $profile->getSalt());
            $profile->setPassword($password);
            }else { $profile->setPassword($old_pass);}
            $this->setRole($request->request->get('current_role'),$profile);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'User profile successfully modified.');
            return $this->redirect($this->generateUrl('users_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$profile->getId(),
            'profile'=>$profile,
        );
    }

        /**
         * @Route("/delete/{id}", name="users_delete")
         * @Method("DELETE")
         * @CsrfProtector(intention="delete_user", name="_token")
         * @ParamConverter("profile", class="LjmsCoreBundle:Profile")
         */
        public function deleteAction(Request $request,$profile){
        $em=$this->getDoctrine()->getManager();
        $em->remove($profile);
        try{
            $em->flush();
        }catch(\Exception $e){
            $request->getSession()->getFlashBag()->add('error', $e->getMessage());
        }
        $request->getSession()->getFlashBag()->add('success', 'User profile successfully deleted.');
        return $this->redirect($this->generateUrl('users_index'));
    }

    /**
     * Multiple change status
     * @Route("/group", name="users_group")
     */
    public function groupAction(Request $request)
    {
        if ($request->request->get('check')){
            $check=$request->request->get('check');
            switch ($request->request->get('action_select')){
                case 'active':
                    $this->active($check,1);
                    $request->getSession()->getFlashBag()->add('success', 'Users Status successfully modified.');
                    break;
                case 'inactive':
                    $this->active($check,0);
                    $request->getSession()->getFlashBag()->add('success', 'Users Status successfully modified.');
                    break;
                case 'delete':
                    $em=$this->getDoctrine()->getManager();
                    $profiles=$em->getRepository('LjmsCoreBundle:Profile')->findBy(array('id'=>$check));
                    foreach($profiles as $profile){
                        $em->remove($profile);
                    }
                    try{
                        $em->flush();
                    }catch(\Exception $e){
                        $request->getSession()->getFlashBag()->add('error', $e->getMessage());
                    }
                    $request->getSession()->getFlashBag()->add('success', 'Users profiles successfully deleted.');
                    break;
            }
        }
        return $this->redirect($this->generateUrl('users_index'));
    }
    /**
     * Multiple change status
     * @param array $check
     * @param boolean $is_active
     */
    private function active($check,$is_active)
    {
        $em=$this->getDoctrine()->getManager();
        $profiles=$em->getRepository('LjmsCoreBundle:Profile')->findBy(array('id'=>$check));
        foreach($profiles as $profile){
            $profile->setIsActive($is_active);
        }
        $em->flush();
    }

    /**
     * Set role for user
     * @param $role
     * @param $profile
     */
    private function setRole($role,&$profile)
    {
        $this->deleteRole($profile);
        $a=0;
        $d=0;
        $g=0;
        $m=0;
        $c=0; //coach
        if($role!==null){
            sort($role);
            foreach ($role as $value){
                $role=substr($value,0,1);
                $i=strpos($value,'|',2);
                $division_id=substr($value,2,$i-2);
                $team_id=substr($value,$i+1);
                $em=$this->getDoctrine()->getManager();
                switch ($role){
                    case '1':
                        $a++;
                        if ($a==1){
                            $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Admin'));
                            $profile->addRole($role);
                        }
                        break;
                    case '2':
                        if (is_numeric($division_id)){
                            $d++;
                            if ($d==1){
                                $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Director'));
                                $profile->addRole($role);
                            }
                            $division = $em->getRepository('LjmsCoreBundle:Division')->find($division_id);
                            $this->_checkRole($division,'director');
                            $division->setProfile($profile);
                            $em->flush();
                        }
                        break;
                    case '3':
                        if (is_numeric($division_id) and is_numeric($team_id)){
                            $c++;
                            if ($c==1){
                                $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Coach'));
                                $profile->addRole($role);
                            }
                            $team = $em->getRepository('LjmsCoreBundle:Team')->find($team_id);
                            $this->_checkRole($team,'coach');
                            $team->setCoachProfile($profile);
                            $em->flush();
                        }
                        break;
                    case '4':
                        if (is_numeric($division_id) and is_numeric($team_id)){
                            $m++;
                            if ($m==1){
                                $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Manager'));
                                $profile->addRole($role);
                            }
                            $team = $em->getRepository('LjmsCoreBundle:Team')->find($team_id);
                            $this->_checkRole($team,'manager');
                            $team->setManagerProfile($profile);
                            $em->flush();
                        }
                        break;
                    case '5':
                        $g++;
                        if ($g==1){
                            $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Guardian'));
                            $profile->addRole($role);
                        }
                }
            }
        }
    }

    /**
     * Delete role from user
     * @param $profile
     */
    private function deleteRole(&$profile)
    {
        $roles=$profile->getRoles();
        if ($roles!=null){
            foreach ($roles as $role){
                $profile->removeRole($role);
            }
            foreach ($profile->getDivisions() as $division){
                $division->setProfile(null);
            }
            foreach ($profile->getCoachTeams() as $coach_team ){
                $coach_team->setCoachProfile(null);
            }
            foreach ($profile->getManagerTeams() as $manager_team ){
                $manager_team->setManagerProfile(null);
            }
        }

    }
    private function _checkRole($entity,$name){
        switch ($name){
            case 'director':
                $old_director=$entity->getProfile();
                if ($old_director!=null and count($old_director->getDivisions())==1){
                    $roles=$old_director->getRoles();
                    foreach ($roles as $role){
                        if ($role->getName()=='Director'){
                            $old_director->removeRole($role);
                        }
                    }
                }
                break;
            case 'coach':
                $old_coach=$entity->getCoachProfile();
                if ($old_coach!=null and count($old_coach->getCoachTeams())==1){
                    $roles=$old_coach->getRoles();
                    foreach ($roles as $role){
                        if ($role->getName()=='Coach'){
                            $old_coach->removeRole($role);
                        }
                    }
                }
                break;
            case 'manager':
                $old_manager=$entity->getManagerProfile();
                if ($old_manager!=null and count($old_manager->getManagerTeams())==1){
                    $roles=$old_manager->getRoles();
                    foreach ($roles as $role){
                        if ($role->getName()=='Manager'){
                            $old_manager->removeRole($role);
                        }
                    }
                }
                break;
        }

    }

}
?>