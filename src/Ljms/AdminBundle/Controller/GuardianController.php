<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Profile;
use Ljms\CoreBundle\Entity\AltContact;
use Ljms\CoreBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Umbrellaweb\Bundle\UsefulAnnotationsBundle\Annotation\CsrfProtector;
use Ljms\CoreBundle\Component\Pagination;
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
        $filter['status']=$request->get('status');
        $page=$request->get('page');
        $limit=$request->get('limit');
        if ($page===null){
            $page=1;
        }
        if ($limit===null){
            $limit=10;
        }
        if ($filter['status']===null){
            $filter['status']='all';
        }
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
            $guardian->setGuardianRole(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($guardian);
            $em->flush();           
            return $this->redirect($this->generateUrl('guardian_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView());
    } 
    /**
     * @Route("/edit/{id}", name="guardian_edit")
     * @Template("LjmsAdminBundle:Guardian:add.html.twig")
     */
    public function editAction(Request $request,$id){
        if ((!$this->get('security.context')->isGranted('ROLE_ADMIN'))and($id!=$this->getUser()->getId())){
            return $this->redirect($this->generateUrl('guardian_index'));
        }
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $em=$this->getDoctrine()->getManager();
        $guardian = $em->getRepository('LjmsCoreBundle:Profile')->find($id);
        if (!$guardian) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new UserType(), $guardian,array('attr'=>array('guardian'=>true)));
        $form->handleRequest($request);
        if ($form->isValid()){
            $password = $encoder->encodePassword($guardian->getPassword(), $guardian->getSalt());
            $guardian->setPassword($password);
            $em->flush();           
            return $this->redirect($this->generateUrl('guardian_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$id);
    }
    /**
     * @Route("/delete/{id}", name="guardian_delete")
     * @Method("DELETE")
     * @CsrfProtector(intention="delete_guardian", name="_token")
     */
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $profile = $em->getRepository('LjmsCoreBundle:Profile')->find($id);
        $em->remove($profile);
        $em->flush();
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
        return $this->redirect($this->generateUrl('guardian_index'));
    }
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