<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Division;
use Ljms\CoreBundle\Form\DivisionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    /**
     * DivisionController - edit/delete operations for backend-users (admins)
     * @Route("admin/divisions")
     */
class DivisionController extends Controller
{
    const DIR='/home/vasiliy/www/web/bundles/ljmshome/tmp';
    /**
     * @Route("", name="division_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $divisions=false;
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
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->findDivisions($filter,$page,$limit);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination=$this->generateNavigation($paginator,$page);
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
        );
    }
    /**
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
            $em->flush();           
            return $this->redirect($this->generateUrl('division_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView(),
            'ajaxUrl'=>'division_add_logo',
        );
    }
    /**
     * @Route("/edit/{id}", name="division_edit")
     * @Template("LjmsAdminBundle:Division:add.html.twig")
     */
    public function editAction(Request $request,$id){
        if (isset ($_GET['id'])){
            $session=$request->getSession();
            $session->set('edit_id',$_GET['id']);
        }    
        $em=$this->getDoctrine()->getManager();
        $division = $em->getRepository('LjmsCoreBundle:Division')->find($id);
        if (!$division) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new DivisionType(), $division);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em->flush();           
            return $this->redirect($this->generateUrl('division_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'photo'=>$division->getWebPath(),
            'edit_id'=>$id,
            'ajaxUrl'=>'division_add_logo',
        );
    }
    /**
     * @Route("/delete/{id}", name="division_delete")
     */
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $division = $em->getRepository('LjmsCoreBundle:Division')->find($id);
        $em->remove($division);
        $em->flush();
        return $this->redirect($this->generateUrl('division_index'));
    }
    /**
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
                    $em->flush();
                    break;
            }
        }
        return $this->redirect($this->generateUrl('division_index'));
    }
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
     * @Route("/get", name="division_get")
     */
    public function getAction(){
        $division_list=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions();
        return new Response(json_encode($division_list));
    }
    /**
     * @Route("/logo", name="division_add_logo")
     */
    public function addLogoAction(Request $request){
        $file=$request->files->get('logo');
        $extension = $file->guessExtension();
        if (!$extension) {
            $extension = 'bin';
        }
        $name=rand(1,999).'.'.$extension;
        $file->move(self::DIR,$name);
        return new Response('/web/bundles/ljmshome/tmp/'.$name);
    }
    private function generateNavigation($paginator,$page){
        $totalItems=count($paginator);
        $pagination['count_pages']=ceil($totalItems / $paginator->getQuery()->getMaxResults());
        $pagination['center']=ceil($pagination['count_pages']/2);
        if ($pagination['count_pages']>7){
            $pagination['end']=$page+3;
            $pagination['i']=$page-3;
            if ( $pagination['end']>$pagination['count_pages']){
                $pagination['end']=$pagination['count_pages'];
                $pagination['i']=$pagination['end']-6;
            }
            if ($pagination['i']<=0){
                $pagination['i']=1;
                switch ($page){
                    case 1:
                        $pagination['end']=$page+6;
                        break;
                    case 2:
                        $pagination['end']=$page+5;
                        break;
                    case 3:
                        $pagination['end']=$page+4;
                        break;
                }
            }
        }
        else{
            $pagination['i']=1;
            $pagination['end']=$pagination['count_pages'];
        }
        return $pagination;
    }

}
?>