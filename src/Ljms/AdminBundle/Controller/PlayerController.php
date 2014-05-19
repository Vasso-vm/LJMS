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
use Ljms\CoreBundle\Component\Pagination\Pagination;
    /**
     * PlayerController - edit/delete operations for backend-users (admins)
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
        $guardian_id=$request->get('id');
        $coach_id=null;
        $id=$this->getUser()->getId();
        if ($page===null){
            $page=1;
        }
        if ($limit===null){
            $limit=10;
        }
        if ($filter['status']===null){
            $filter['status']='all';
        }
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')){
            if ($this->get('security.context')->isGranted('ROLE_GUARDIAN')){
                $guardian_id=$this->getUser()->getId();
            }
            if ($this->get('security.context')->isGranted('ROLE_COACH')){
                $coach_id=$this->getUser()->getId();
            }
        }
        $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Player')->findPlayers($filter,$page,$limit,$guardian_id,$coach_id);
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination= new Pagination();
                $pagination=$pagination->generate($paginator,$page);
            }
            $players=$paginator->getQuery()->getResult();
        }
        return array (
            'players'=>$players,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
            'guardian'=>false,
            'id'=>$id,
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
            $request->getSession()->getFlashBag()->add('success', 'New player has been added.');
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
        if ((!$this->get('security.context')->isGranted('ROLE_ADMIN'))and($player->getProfile()->getId()!=$this->getUser()->getId())){
            return $this->redirect($this->generateUrl('player_index'));
        }
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
            $request->getSession()->getFlashBag()->add('success', 'Player profile successfully modified.');
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

}
?>