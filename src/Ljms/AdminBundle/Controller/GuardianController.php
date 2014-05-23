<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Profile;
use Ljms\CoreBundle\Entity\AltContact;
use Ljms\CoreBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Umbrellaweb\Bundle\UsefulAnnotationsBundle\Annotation\CsrfProtector;
use Ljms\CoreBundle\Component\Pagination\Pagination;
    /**
     * GuardianController - edit/delete operations for backend-users (admins)
     * @Route("admin/guardian")
     */
    class GuardianController extends Controller
    {
    /**
     * @Route("", name="guardian_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $guardians=false;
        $pagination=false;
        $page = ($request->get('page')!==null) ? $request->get('page') : 1;
        $limit = ($request->get('limit')!==null) ? $request->get('limit') : 10;
        $filter['status'] = ($request->get('status')) ? $request->get('status') : 'all';
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')){
            $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Profile')->findGuardians($filter,$page,$limit);
        }else{
            $id=$this->getUser()->getId();
            $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Profile')->findGuardians($filter,$page,$limit,$id);
        }
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination= new Pagination();
                $pagination=$pagination->generate($paginator,$page);
            }
            $guardians=$paginator->getQuery()->getResult();
        }
       return array (
           'guardians'=>$guardians,
           'filter'=>$filter,
           'pagination'=>$pagination,
           'page'=>$page,
           'limit'=>$limit,
           'csrf' => $this->get('form.csrf_provider')->generateCsrfToken('delete_guardian')
        );
    }
    /**
     * @Route("/add", name="guardian_add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $guardian = new Profile();
        $form = $this->createForm(new UserType(), $guardian,array('validation_groups' => array('Profile','Add','Address','AltContact'),'attr'=>array('guardian'=>true)));
        $form->handleRequest($request);
        if ($form->isValid()){
            $password = $encoder->encodePassword($guardian->getPassword(), $guardian->getSalt());
            $guardian->setPassword($password);
            $role=$this->getDoctrine()->getRepository('LjmsCoreBundle:Role')->findOneBy(array('name'=>'Guardian'));
            $guardian->addRole($role);
            $em = $this->getDoctrine()->getManager();
            $em->persist($guardian);
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            $request->getSession()->getFlashBag()->add('success', 'New guardian has been added.');
            return $this->redirect($this->generateUrl('guardian_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView());
    } 
    /**
     * @Route("/edit/{id}", name="guardian_edit")
     * @Template("LjmsAdminBundle:Guardian:add.html.twig")
     * @ParamConverter("guardian", class="LjmsCoreBundle:Profile")
     */
    public function editAction(Request $request,$guardian){
        if ((!$this->get('security.context')->isGranted('ROLE_ADMIN'))and($guardian->getId()!=$this->getUser()->getId())){
            return $this->redirect($this->generateUrl('guardian_index'));
        }
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $old_pass=$guardian->getPassword();
        $em=$this->getDoctrine()->getManager();
        if (!$guardian) {
            throw $this->createNotFoundException(
                'No profile found for id '.$guardian->getId()
            );
        }
        $form = $this->createForm(new UserType(), $guardian,array('attr'=>array('guardian'=>true)));
        $form->handleRequest($request);
        if ($form->isValid()){
            if ($guardian->getPassword()!==null){
                $password = $encoder->encodePassword($guardian->getPassword(), $guardian->getSalt());
                $guardian->setPassword($password);
            }else { $guardian->setPassword($old_pass);}
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            $request->getSession()->getFlashBag()->add('success', 'Guardian profile successfully modified.');
            return $this->redirect($this->generateUrl('guardian_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$guardian->getId());
    }
    /**
     * @Route("/delete/{id}", name="guardian_delete")
     * @Method("DELETE")
     * @CsrfProtector(intention="delete_guardian", name="_token")
     * @ParamConverter("profile", class="LjmsCoreBundle:Profile")
     */
    public function deleteAction(Request $request,$profile){
        $em=$this->getDoctrine()->getManager();
        $em->remove($profile);
        $em->flush();
        $request->getSession()->getFlashBag()->add('success', 'Guardians profiles successfully deleted.');
        return $this->redirect($this->generateUrl('guardian_index'));
    }
    /**
     * @Route("/group", name="guardian_group")
     */
    public function groupAction(Request $request)
    {
        if ($request->request->get('check')){
            $check=$request->request->get('check');
            switch ($request->request->get('action_select')){
                case 'active':
                    $this->active($check,1);
                    $request->getSession()->getFlashBag()->add('success', 'Guardians Status successfully modified.');
                    break;
                case 'inactive':
                    $this->active($check,0);
                    $request->getSession()->getFlashBag()->add('success', 'Guardians Status successfully modified.');
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
                    $request->getSession()->getFlashBag()->add('success', 'Guardians profiles successfully deleted.');
                    break;
            }
        }
        return $this->redirect($this->generateUrl('guardian_index'));
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

    }
?>