<?php

namespace Ljms\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ljms\CoreBundle\Form\UserType;
use Ljms\CoreBundle\Entity\AltContact;
use Ljms\CoreBundle\Entity\Division;
use Ljms\CoreBundle\Entity\Profile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
    public function indexAction()
    {
        $page=1;
        $limit=10;
        $filter=array(
            'status'=>'all',
            'division'=>'all'
            );
        if (isset ($_GET['status'])){
            $filter['status']=htmlspecialchars($_GET['status']);
        }
        if (isset($_GET['division'])){
            $filter['division']=htmlspecialchars($_GET['division']);
        }
        $status=null;
		return array (
            'users'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Profile')->findUsers($filter),
            'filter'=>$filter,
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
        );
    }

    /**
     * @Route("/add", name="users_add")
     * @Template()
     */
    public function addAction(Request $request){
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $profile = new Profile();
        $profile->setAltContact(new AltContact());
        $form = $this->createForm(new UserType(), $profile);
        $form->handleRequest($request);
        if ($form->isValid()){
            $password = $encoder->encodePassword($profile->getPassword(), $profile->getSalt());
            $profile->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush();           
            return $this->redirect($this->generateUrl('users_index'));
        }
        return array('method'=>'add','form'=>$form->createView());
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
            $em->flush();           
            return $this->redirect($this->generateUrl('users_index'));
        }
        return array('method'=>'edit','form'=>$form->createView(),'Url'=>'users_index','edit_id'=>$id);
    }
    /**
     * @Route("/delete/{id}", name="users_delete")
     */
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $profile = $em->getRepository('LjmsCoreBundle:Profile')->find($id);
        $em->remove($profile);
        $em->flush();
        return $this->redirect($this->generateUrl('users_index'));
    }
    /**
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