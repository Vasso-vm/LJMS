<?php

namespace Ljms\AdminBundle\Controller;
use Ljms\CoreBundle\Entity\Player;
use Ljms\CoreBundle\Entity\Profile;
use Ljms\CoreBundle\Entity\Address;
use Ljms\CoreBundle\Form\PlayerType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
        $filter['status']=$request->get('status');
        if ($request->get('id')){
            $id=intval($_GET['id']);
            return array (
                'profile'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Profile')->find($id),
                'filter'=>$filter,
                'guardian'=>true
            );
        }
        return array (
            'players'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Player')->findPlayers($filter),
            'filter'=>$filter,
            'guardian'=>false
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
            $em->persist($player);
            $em->flush();           
            return $this->redirect($this->generateUrl('player_index'));
        }
        return array('method'=>'add','form'=>$form->createView(),'guardian_id'=>$profile->getId());
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
            'edit_id'=>$id);
    }
    /**
     * @Route("/delete/{id}", name="player_delete")
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