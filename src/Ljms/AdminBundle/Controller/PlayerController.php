<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Player;
use Ljms\CoreBundle\Form\PlayerType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Umbrellaweb\Bundle\UsefulAnnotationsBundle\Annotation\CsrfProtector;
    /**
     * GuardianController - edit/delete operations for backend-users (admins)
     * @Route("admin/players")
     */
    class PlayerController extends Controller
    {
    /**
     * @Route("", name="player_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $players=false;
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
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Player')->findPlayers($filter,$page,$limit);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination=$this->generateNavigation($paginator,$page);
            }
            $players=$paginator->getQuery()->getResult();
        }
        if ($request->get('id')){
            $id=$request->get('id');
            return array (
                'profile'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Profile')->find($id),
                'filter'=>$filter,
                'pagination'=>$pagination,
                'page'=>$page,
                'limit'=>$limit,
                'guardian'=>true,
                'csrf' => $this->get('form.csrf_provider')->generateCsrfToken('delete_player')
            );
        }
        return array (
            'players'=>$players,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
            'guardian'=>false,
            'csrf' => $this->get('form.csrf_provider')->generateCsrfToken('delete_player')
        );
    }
    /**
     * @Route("/add/{id}", name="player_add")
     * @ParamConverter("profile", class="LjmsCoreBundle:Profile")
     * @Template()
     */
    public function addAction(Request $request,$profile){
        $player = new Player();
        $player->setProfile($profile);
        $form = $this->createForm(new PlayerType(), $player);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            if ($player->getSharesGuardianAddress()==1){
                $player->setAddress($player->getProfile()->getAddress());
            }
            $em->persist($player);
            $em->flush();           
            return $this->redirect($this->generateUrl('player_index'));
        }
        return array('method'=>'add','form'=>$form->createView(),'guardian_id'=>$profile->getId(),'ajaxUrl'=>'team_get');
    }
    /**
     * @Route("/edit/{id}", name="player_edit")
     * @Template("LjmsAdminBundle:Player:add.html.twig")
     */
    public function editAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $player = $em->getRepository('LjmsCoreBundle:Player')->find($id);
        if (!$player) {
            throw $this->createNotFoundException(
                'No profile found for id '.$id
            );
        }
        $form = $this->createForm(new PlayerType(), $player);
        $form->handleRequest($request);
        if ($form->isValid()){
            if ($player->getSharesGuardianAddress()==1){
                $player->setAddress($player->getProfile()->getAddress());
            }
            $em->flush();           
            return $this->redirect($this->generateUrl('player_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'edit_id'=>$id,
            'ajaxUrl'=>'team_get'
        );
    }
    /**
     * @Route("/delete/{id}", name="player_delete")
     * @Method("DELETE")
     * @CsrfProtector(intention="delete_player", name="_token")
     */
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $player = $em->getRepository('LjmsCoreBundle:Player')->find($id);
        $em->remove($player);
        $em->flush();
        return $this->redirect($this->generateUrl('player_index'));
    }
    /**
     * @Route("/group", name="player_group")
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
                    $players=$em->getRepository('LjmsCoreBundle:Player')->findBy(array('id'=>$check));
                    foreach($players as $player){
                        $em->remove($player);
                    }
                    $em->flush();
                    break;
            }
        }
        return $this->redirect($this->generateUrl('player_index'));
    }
    private function active($check,$is_active)
    {
        $em=$this->getDoctrine()->getManager();
        $players=$em->getRepository('LjmsCoreBundle:Player')->findBy(array('id'=>$check));
        foreach($players as $player){
            $player->setIsActive($is_active);
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