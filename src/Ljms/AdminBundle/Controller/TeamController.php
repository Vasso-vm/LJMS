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
        $teams=false;
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
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Team')->findTeams($filter,$page,$limit);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination=$this->generateNavigation($paginator,$page);
            }
            $teams=$paginator->getQuery()->getResult();
        }
        return array (
            'teams'=>$teams,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
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