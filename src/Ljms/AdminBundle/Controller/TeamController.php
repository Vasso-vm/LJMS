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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Umbrellaweb\Bundle\UsefulAnnotationsBundle\Annotation\CsrfProtector;
use Ljms\CoreBundle\Component\Pagination\Pagination;
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
        $teams=false;
        $pagination=false;
        $filter['status']=$request->get('status');
        $filter['division']=$request->get('division');
        $page=$request->get('page');
        $limit=$request->get('limit');
        $director_id=null;
        $coach_id=null;
        $manager_id=null;
        $id=$this->getUser()->getId();
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
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')){
            if ($this->get('security.context')->isGranted('ROLE_DIRECTOR')){
                $director_id=$this->getUser()->getId();
            }
            if ($this->get('security.context')->isGranted('ROLE_COACH')){
                $coach_id=$this->getUser()->getId();
            }
            if ($this->get('security.context')->isGranted('ROLE_MANAGER')){
                $manager_id=$this->getUser()->getId();
            }
        }
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Team')->findTeams($filter,$page,$limit,$director_id,$coach_id,$manager_id);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination= new Pagination();
                $pagination=$pagination->generate($paginator,$page);
            }
            $teams=$paginator->getQuery()->getResult();
        }
        return array (
            'teams'=>$teams,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
            'id'=>$id,
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
            'csrf' => $this->get('form.csrf_provider')->generateCsrfToken('delete_team')
        );
    }
    /**
     * @Route("/add", name="team_add")
     * @Template()
     */
    public function addAction(Request $request){
        $team = new Team();
        $id=null;
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')){
            $id=$this->getUser()->getId();
        }
        $form = $this->createForm(new TeamType(), $team, array('attr'=>array('id'=>$id)));
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'New team has been added.');
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
        $profile=$team->getDivision()->getProfile();
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')){
            $id=$this->getUser()->getId();
            if ($profile===null){
                return $this->redirect($this->generateUrl('team_index'));
            }
            if ($profile->getId()!=$this->getUser()->getId()){
                return $this->redirect($this->generateUrl('team_index'));
            }
        }
        if (!$team) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new TeamType(), $team,array('attr'=>array('id'=>$id)));
        $form->handleRequest($request);
        if ($form->isValid()){
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'Team successfully modified.');
            return $this->redirect($this->generateUrl('team_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$id);
    }
    /**
     * @Route("/delete/{id}", name="team_delete")
     * @Method("DELETE")
     * @CsrfProtector(intention="delete_team", name="_token")
     */
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $profile = $em->getRepository('LjmsCoreBundle:Team')->find($id);
        $em->remove($profile);
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
        $coach=$team->getCoachProfile();
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')){
            if ($coach===null){
                return $this->redirect($this->generateUrl('team_index'));
            }
            if ($coach->getId()!=$this->getUser()->getId()){
                return $this->redirect($this->generateUrl('team_index'));
            }
        }
        if (!$team) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new AssignType(),null, array('attr'=>array('id'=>$id,'team_name'=>$team->getName(),'division_name'=>$team->getDivision()->getName(),)));
        $form->handleRequest($request);
        if ($request->request->get('assign')){
            $assign=$request->request->get('assign');
            if (isset($assign['players'])){
                $assign_players=$em->getRepository('LjmsCoreBundle:Player')->findBy(array('id'=>$assign['players']));
                foreach ($assign_players as $player){
                    $player->setTeam($team);
                }
            }
            if (isset($assign['not_assign_players'])){
                $not_assign_players=$em->getRepository('LjmsCoreBundle:Player')->findBy(array('id'=>$assign['not_assign_players']));
                foreach ($not_assign_players as $player){
                    $player->setTeam(null);
                }
            }
            $em->flush();
            return $this->redirect($this->generateUrl('team_index'));
        }
        return array(
            'form'=>$form->createView(),
            'edit_id'=>$id,);
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