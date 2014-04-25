<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Schedule;
use Ljms\CoreBundle\Entity\Division;
use Ljms\CoreBundle\Form\ScheduleType;
use Ljms\CoreBundle\Form\ResultType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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
    public function indexAction()
    {
        $filter=array(
            'division'=>'all'
        );
        if (isset ($_GET['division'])){
            $filter['division']=htmlspecialchars($_GET['division']);
        }
        return array (
            'schedule'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Schedule')->findSchedules($filter),
            'filter'=>$filter,
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
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
        return array('method'=>'add','form'=>$form->createView());
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
        return array('method'=>'edit','form'=>$form->createView(),'edit_id'=>$id);
    }
    /**
     * @Route("/delete/{id}", name="schedule_delete")
     */
    public function deleteAction(Request $request,$id){
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
     * @Route("/get", name="schedule_get")
     */
    public function getAction(){
        $id=intval($_POST['id']);
        $team_list=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getTeams($id);
        return new Response(json_encode($team_list));
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
}
?>