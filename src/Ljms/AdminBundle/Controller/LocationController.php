<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Location;
use Ljms\CoreBundle\Form\LocationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    /**
     * LocationController - edit/delete operations for backend-users (admins)
     * @Route("admin/location")
     */
class LocationController extends Controller
{
    /**
     * @Route("", name="location_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $locations=false;
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
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Location')->findLocations($filter,$page,$limit);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination=$this->generateNavigation($paginator,$page);
            }
            $locations=$paginator->getQuery()->getResult();
        }
        return array (
            'locations'=>$locations,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
        );
    }
    /**
     * @Route("/add", name="location_add")
     * @Template()
     */
    public function addAction(Request $request){
        $location = new Location();
        $form = $this->createForm(new LocationType(), $location);
        $form->handleRequest($request);
        if ($form->isValid()){
            $location->setGoogleMapLink('https://www.google.com/maps/place/'.$location->getAddress().'+'.$location->getState()->getName().'+'.$location->getCity());
            $em = $this->getDoctrine()->getManager();
            $em->persist($location);
            $em->flush();
            return $this->redirect($this->generateUrl('location_index'));
        }
        return array('method'=>'add','form'=>$form->createView());
    }
    /**
     * @Route("/edit/{id}", name="location_edit")
     * @Template("LjmsAdminBundle:Location:add.html.twig")
     */
    public function editAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $location = $em->getRepository('LjmsCoreBundle:Location')->find($id);
        if (!$location) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new LocationType(), $location);
        $form->handleRequest($request);
        if ($form->isValid()){
            $location->setGoogleMapLink('https://www.google.com/maps/place/'.$location->getAddress().'+'.$location->getState()->getName().'+'.$location->getCity());
            $em->flush();
            return $this->redirect($this->generateUrl('location_index'));
        }
        return array('method'=>'edit','form'=>$form->createView(),'edit_id'=>$id);
    }
    /**
     * @Route("/delete/{id}", name="location_delete")
     */
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $location = $em->getRepository('LjmsCoreBundle:Location')->find($id);
        $em->remove($location);
        $em->flush();
        return $this->redirect($this->generateUrl('location_index'));
    }
    /**
     * @Route("/group", name="location_group")
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
                    $locations=$em->getRepository('LjmsCoreBundle:Location')->findBy(array('id'=>$check));
                    foreach($locations as $location){
                        $em->remove($location);
                    }
                    $em->flush();
                    break;
            }
        }
        return $this->redirect($this->generateUrl('location_index'));
    }
    private function active($check,$is_active)
    {
        $em=$this->getDoctrine()->getManager();
        $locations=$em->getRepository('LjmsCoreBundle:Location')->findBy(array('id'=>$check));
        foreach($locations as $location){
            $location->setIsActive($is_active);
        }
        $em->flush();
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
