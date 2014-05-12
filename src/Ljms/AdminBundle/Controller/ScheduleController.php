<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Schedule;
use Ljms\CoreBundle\Form\ScheduleType;
use Ljms\CoreBundle\Form\ResultType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Umbrellaweb\Bundle\UsefulAnnotationsBundle\Annotation\CsrfProtector;
/**
 * ScheduleController - edit/delete operations for backend-users (admins)
 * @Route("admin/schedule")
 */
class ScheduleController extends Controller
{
    /**
     * @Route("", name="schedule_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $schedule=false;
        $pagination=false;
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
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Schedule')->findSchedules($filter,$page,$limit);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination=$this->generateNavigation($paginator,$page);
            }
            $schedule=$paginator->getQuery()->getResult();
        }
        return array (
            'schedule'=>$schedule,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
            'csrf' => $this->get('form.csrf_provider')->generateCsrfToken('delete_schedule')
        );

    }

    /**
     * @Route("/add", name="schedule_add")
     * @Template()
     */
    public function addAction(Request $request){
        $schedule = new Schedule();
        $form = $this->createForm(new ScheduleType(),$schedule);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($schedule);
            $em->flush();
            return $this->redirect($this->generateUrl('schedule_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView(),
            'url'=>'team_get');
    }

    /**
     * @Route("/edit/{id}", name="schedule_edit")
     * @Template("LjmsAdminBundle:Schedule:add.html.twig")
     */
    public function editAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $schedule = $em->getRepository('LjmsCoreBundle:Schedule')->find($id);
        if (!$schedule) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new ScheduleType(), $schedule);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em->flush();
            return $this->redirect($this->generateUrl('schedule_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$id,
            'url'=>'team_get');
    }

    /**
     * @Route("/delete/{id}", name="schedule_delete")
     * @Method("DELETE")
     * @CsrfProtector(intention="delete_schedule", name="_token")
     */
    public function deleteAction($id){
        $em=$this->getDoctrine()->getManager();
        $schedule = $em->getRepository('LjmsCoreBundle:Schedule')->find($id);
        $em->remove($schedule);
        $em->flush();
        return $this->redirect($this->generateUrl('schedule_index'));
    }

    /**
     * @Route("/result/{id}", name="schedule_result")
     * @Template()
     */
    public function resultAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $schedule = $em->getRepository('LjmsCoreBundle:Schedule')->find($id);
        if (!$schedule) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new ResultType(), $schedule);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em->flush();
            return $this->redirect($this->generateUrl('schedule_index'));
        }
        return array('form'=>$form->createView(),'edit_id'=>$id);
    }

    /**
     * @Route("/group", name="schedule_group")
     */
    public function groupAction(Request $request)
    {
        if ($request->request->get('check')){
            $check=$request->request->get('check');
            switch ($request->request->get('action_select')){
                case 'delete':
                    $em=$this->getDoctrine()->getManager();
                    $schedules=$em->getRepository('LjmsCoreBundle:Schedule')->findBy(array('id'=>$check));
                    foreach($schedules as $schedule){
                        $em->remove($schedule);
                    }
                    $em->flush();
                    break;
            }
        }
        return $this->redirect($this->generateUrl('schedule_index'));
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