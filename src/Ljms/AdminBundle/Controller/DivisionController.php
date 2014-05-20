<?php

namespace Ljms\AdminBundle\Controller;

use Ljms\CoreBundle\Entity\Division;
use Ljms\CoreBundle\Form\DivisionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Umbrellaweb\Bundle\UsefulAnnotationsBundle\Annotation\CsrfProtector;
use Ljms\CoreBundle\Component\Pagination\Pagination;
    /**
     * DivisionController - edit/delete operations for backend-users (admins)
     * @Route("admin/divisions")
     */
class DivisionController extends Controller
{
    /**
     * @Route("", name="division_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $divisions=false;
        $pagination=false;
        $page = ($request->get('page')) ? $request->get('page') : 1;
        $limit = ($request->get('limit')) ? $request->get('limit') : 10;
        $filter['division'] = ($request->get('division')) ? $request->get('division') : 'all';
        $filter['status'] = ($request->get('status')) ? $request->get('status') : 'all';
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')){
            $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->findDivisions($filter,$page,$limit);
        }else{
            $id=$this->getUser()->getId();
            $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->findDivisions($filter,$page,$limit,$id);
        }
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination= new Pagination();
                $pagination=$pagination->generate($paginator,$page);
            }
            $divisions=$paginator->getQuery()->getResult();
        }
        return array (
            'divisions'=>$divisions,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
            'csrf' => $this->get('form.csrf_provider')->generateCsrfToken('delete_division')
        );
    }
    /**
     * Add new division
     * @Route("/add", name="division_add")
     * @Template()
     */
    public function addAction(Request $request){
        $division = new Division();
        $form = $this->createForm(new DivisionType(), $division);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($division);
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            $request->getSession()->getFlashBag()->add('success', 'New division has been added.');
            return $this->redirect($this->generateUrl('division_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView(),
        );
    }
    /**
     * Edit division
     * @Route("/edit/{id}", name="division_edit")
     * @Template("LjmsAdminBundle:Division:add.html.twig")
     */
    public function editAction(Request $request,$id){
        if ($request->get('id')!==null){
            $session=$request->getSession();
            $session->set('edit_id',$request->get('id'));
        }    
        $em=$this->getDoctrine()->getManager();
        $division = $em->getRepository('LjmsCoreBundle:Division')->find($id);
        if ((!$this->get('security.context')->isGranted('ROLE_ADMIN'))and($division->getProfile()->getId()!=$this->getUser()->getId())){
            return $this->redirect($this->generateUrl('division_index'));
        }
        if (!$division) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new DivisionType(), $division);
        $form->handleRequest($request);
        if ($form->isValid()){
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            $request->getSession()->getFlashBag()->add('success', 'Division successfully modified.');
            return $this->redirect($this->generateUrl('division_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'photo'=>$division->getWebPath(),
            'edit_id'=>$id,
        );
    }
    /**
     * @Route("/delete/{id}", name="division_delete")
     * @Method("DELETE")
     * @CsrfProtector(intention="delete_division", name="_token")
     */
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $division = $em->getRepository('LjmsCoreBundle:Division')->find($id);
        $em->remove($division);
        try{
            $em->flush();
        }catch(\Exception $e){
            $request->getSession()->getFlashBag()->add('error', $e->getMessage());
        }
        $request->getSession()->getFlashBag()->add('success', 'Division successfully deleted.');
        return $this->redirect($this->generateUrl('division_index'));
    }
    /**
     * Multiple delete,edit status
     * @Route("/group", name="division_group")
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
                    $divisions=$em->getRepository('LjmsCoreBundle:Division')->findBy(array('id'=>$check));
                    foreach($divisions as $division){
                        $em->remove($division);
                    }
                    try{
                        $em->flush();
                    }catch(\Exception $e){
                        $request->getSession()->getFlashBag()->add('error', $e->getMessage());
                    }
                    break;
            }
        }
        return $this->redirect($this->generateUrl('division_index'));
    }

    /**
     * Multiple change status
     * @param array $check
     * @param boolean $is_active
     */
    private function active($check,$is_active)
    {
        $em=$this->getDoctrine()->getManager();
        $divisions=$em->getRepository('LjmsCoreBundle:Division')->findBy(array('id'=>$check));
        foreach($divisions as $division){
            $division->setIsActive($is_active);
        }
        $em->flush();
    }
    /**
     * Get division list for change director
     * @Route("/get", name="division_get")
     */
    public function getAction(){
        $division_list=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions();
        return new Response(json_encode($division_list));
    }
    /**
     * Ajax upload photo
     * @Route("/logo", name="division_add_logo")
     */
    public function addLogoAction(Request $request){
        $file=$request->files->get('logo');
        $division= new Division();
        $dir=$this->container->getParameter('temp_dir');
        return new Response($division->uploadLogo($file,$dir));
    }
}
?>