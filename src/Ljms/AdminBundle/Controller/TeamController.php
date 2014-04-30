<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Team;
use Symfony\Component\HttpFoundation\Request;
use Ljms\CoreBundle\Form\TeamType;
use Ljms\CoreBundle\Form\AssignType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    /**
     * TeamController - edit/delete operations for backend-users (admins)
     * @Route("admin/teams")
     */
class TeamController extends Controller
{
    /**
     * @Route("", name="team_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $filter['status']=$request->get('status');
        $filter['division']=$request->get('division');
        return array (
            'teams'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Team')->findTeams($filter),
            'Url'=>'team_add',
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
            'filter'=>$filter,          
        );
    }
    /**
     * @Route("/add", name="team_add")
     * @Template()
     */
    public function addAction(Request $request){
        $team = new Team();
        $form = $this->createForm(new TeamType(), $team);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();           
            return $this->redirect($this->generateUrl('team_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView(),
            'Url'=>'team_index');
    }
    /**
     * @Route("/edit/{id}", name="team_edit")
     * @Template("LjmsAdminBundle:Team:add.html.twig")
     */
    public function editAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $team = $em->getRepository('LjmsCoreBundle:Team')->find($id);
        if (!$team) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new TeamType(), $team);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em->flush();           
            return $this->redirect($this->generateUrl('team_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$id);
    }
    /**
     * @Route("/delete/{id}", name="team_delete")
     */
    public function deleteAction($id){
        $em=$this->getDoctrine()->getManager();
        $team = $em->getRepository('LjmsCoreBundle:Team')->find($id);
        $em->remove($team);
        $em->flush();
        return $this->redirect($this->generateUrl('team_index'));
    }

    /**
     * @Route("/group", name="team_group")
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
                    $teams=$em->getRepository('LjmsCoreBundle:Team')->findBy(array('id'=>$check));
                    foreach($teams as $team){
                        $em->remove($team);
                    }
                    $em->flush();
                    break;
            }
        }
        return $this->redirect($this->generateUrl('team_index'));
    }

    private function active($check,$is_active)
    {
        $em=$this->getDoctrine()->getManager();
        $teams=$em->getRepository('LjmsCoreBundle:Team')->findBy(array('id'=>$check));
        foreach($teams as $team){
            $team->setIsActive($is_active);
        }
        $em->flush();
    }

    /**
     * @Route("/assign/{id}", name="team_assign")
     * @Template()
     */
    public function assignAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $team = $em->getRepository('LjmsCoreBundle:Team')->find($id);
        if (!$team) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new AssignType(), $team, array('attr'=>array('id'=>$id)));
        $form->handleRequest($request);
        var_dump($form->getErrorsAsString());

        if ($form->isValid()){
            $em->flush();
            return $this->redirect($this->generateUrl('team_index'));
        }
        return array('form'=>$form->createView(),'edit_id'=>$id);
    }

    /**
     * @Route("/get", name="team_get")
     */
    public function getAction(){
        $id=intval($_POST['id']);
        $team_list=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getTeams($id);
        return new Response(json_encode($team_list));
    }
}
?>