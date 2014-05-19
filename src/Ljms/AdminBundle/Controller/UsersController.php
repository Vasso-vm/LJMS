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
        $filter['status']=$request->get('status');
        $filter['division']=$request->get('division');
        $page=$request->get('page');
        $limit=$request->get('limit');
        if ($page===null){
            $page=1;
        }
        if ($limit===null){
            $limit=10;
        }
        if ($filter['division']===null){
            $filter['division']='all';
        }
        if ($filter['status']===null){
            $filter['status']='all';
        }
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
            'url'=>'team_get',
            'ajaxUrl'=>'division_get',
        );
    }

    /**
     * @Route("/edit/{id}", name="users_edit")
     * @Template("LjmsAdminBundle:Users:add.html.twig")
     */
    public function editAction(Request $request,$id){
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $em=$this->getDoctrine()->getManager();
        $profile = $em->getRepository('LjmsCoreBundle:Profile')->find($id);
        if (!$profile) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new UserType(), $profile);
        $form->handleRequest($request);
        if ($form->isValid()){
            $password = $encoder->encodePassword($profile->getPassword(), $profile->getSalt());
            $profile->setPassword($password);
            $this->setRole($request->request->get('current_role'),$profile);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'User profile successfully modified.');
            return $this->redirect($this->generateUrl('users_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$id,
            'url'=>'team_get',
            'profile'=>$profile,
            'ajaxUrl'=>'division_get');
    }

        /**
         * @Route("/delete/{id}", name="users_delete")
         * @Method("DELETE")
         * @CsrfProtector(intention="delete_user", name="_token")
         */
        public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $profile = $em->getRepository('LjmsCoreBundle:Profile')->find($id);
        $em->remove($profile);
        $em->flush();
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
                    break;
                case 'inactive':
                    $this->active($check,0);
                    break;
                case 'delete':
                    $em=$this->getDoctrine()->getManager();
                    $profiles=$em->getRepository('LjmsCoreBundle:Profile')->findBy(array('id'=>$check));
                    foreach($profiles as $profile){
                        $em->remove($profile);
                    }
                    $em->flush();
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
                        $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Admin'));
                        $profile->addRole($role);
                        break;
                    case '2':
                        $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Director'));
                        $profile->addRole($role);
                        $division = $em->getRepository('LjmsCoreBundle:Division')->find($division_id);
                        $division->setProfile($profile);
                        $em->flush();
                        break;
                    case '3':
                        $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Coach'));
                        $profile->addRole($role);
                        $team = $em->getRepository('LjmsCoreBundle:Team')->find($team_id);
                        $team->setCoachProfile($profile);
                        $em->flush();
                        break;
                    case '4':
                        $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Manager'));
                        $profile->addRole($role);
                        $team = $em->getRepository('LjmsCoreBundle:Team')->find($team_id);
                        $team->setManagerProfile($profile);
                        $em->flush();
                    case '5':
                        $role=$em->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Guardian'));
                        $profile->addRole($role);
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
?>