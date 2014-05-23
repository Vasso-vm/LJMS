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
use Ljms\CoreBundle\Component\Pagination\Pagination;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
        $manager_id=null;
        $coach_id=null;
        $id=$this->getUser()->getId();
        $page = ($request->get('page')!==null) ? $request->get('page') : 1;
        $limit = ($request->get('limit')!==null) ? $request->get('limit') : 10;
        $filter['division'] = ($request->get('division')) ? $request->get('division') : 'all';
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')){
            if ($this->get('security.context')->isGranted('ROLE_MANAGER')){
                $manager_id=$this->getUser()->getId();
            }
            if ($this->get('security.context')->isGranted('ROLE_COACH')){
                $coach_id=$this->getUser()->getId();
            }
        }
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Schedule')->findSchedules($filter,$page,$limit,$coach_id,$manager_id);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination= new Pagination();
                $pagination=$pagination->generate($paginator,$page);
            }
            $schedule=$paginator->getQuery()->getResult();
        }
        return array (
            'schedule'=>$schedule,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'id'=>$id,
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
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            $request->getSession()->getFlashBag()->add('success', 'New schedule has been added.');
            return $this->redirect($this->generateUrl('schedule_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView(),
        );
    }

    /**
     * @Route("/edit/{id}", name="schedule_edit")
     * @Template("LjmsAdminBundle:Schedule:add.html.twig")
     * @ParamConverter("schedule", class="LjmsCoreBundle:Schedule")
     */
    public function editAction(Request $request,$schedule){
        $em=$this->getDoctrine()->getManager();
        $profile=$schedule->getHomeTeam()->getManagerProfile();
        $profile1=$schedule->getVisitingTeam()->getManagerProfile();
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')){
            if (($profile===null or $profile->getId()!=$this->getUser()->getId()) and ($profile1===null or $profile1->getId()!=$this->getUser()->getId()) ){
                return $this->redirect($this->generateUrl('schedule_index'));
            }
        }
        if (!$schedule) {
            throw $this->createNotFoundException(
                'No profile found for id '.$schedule->getId()
            );
        }
        $form = $this->createForm(new ScheduleType(), $schedule);
        $form->handleRequest($request);
        if ($form->isValid()){
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            $request->getSession()->getFlashBag()->add('success', 'Schedule successfully modified.');
            return $this->redirect($this->generateUrl('schedule_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$schedule->getId(),
        );
    }

    /**
     * @Route("/delete/{id}", name="schedule_delete")
     * @Method("DELETE")
     * @CsrfProtector(intention="delete_schedule", name="_token")
     * @ParamConverter("schedule", class="LjmsCoreBundle:Schedule")
     */
    public function deleteAction(Request $request,$schedule){
        $em=$this->getDoctrine()->getManager();
        $em->remove($schedule);
        try{
            $em->flush();
        }catch(\Exception $e){
            $request->getSession()->getFlashBag()->add('error', $e->getMessage());
        }
        $request->getSession()->getFlashBag()->add('success', 'Schedule successfully deleted.');
        return $this->redirect($this->generateUrl('schedule_index'));
    }

    /**
     * @Route("/result/{id}", name="schedule_result")
     * @Template()
     * @ParamConverter("schedule", class="LjmsCoreBundle:Schedule")
     */
    public function resultAction(Request $request,$schedule){
        $em=$this->getDoctrine()->getManager();
        $profile=$schedule->getHomeTeam()->getManagerProfile();
        $profile1=$schedule->getVisitingTeam()->getManagerProfile();
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')){
            if (($profile===null or $profile->getId()!=$this->getUser()->getId()) and ($profile1===null or $profile1->getId()!=$this->getUser()->getId()) ){
                return $this->redirect($this->generateUrl('schedule_index'));
            }
        }
        if (!$schedule) {
            throw $this->createNotFoundException(
                'No profile found for id '.$schedule->getId()
            );
        }
        $form = $this->createForm(new ResultType(), $schedule);
        $form->handleRequest($request);
        if ($form->isValid()){
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            return $this->redirect($this->generateUrl('schedule_index'));
        }
        return array(
            'form'=>$form->createView(),
            'edit_id'=>$schedule->getId());
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
                    try{
                        $em->flush();
                    }catch(\Exception $e){
                        $request->getSession()->getFlashBag()->add('error', $e->getMessage());
                    }
                    $request->getSession()->getFlashBag()->add('success', 'Schedules successfully deleted.');
                    break;
            }
        }
        return $this->redirect($this->generateUrl('schedule_index'));
    }


}
?>