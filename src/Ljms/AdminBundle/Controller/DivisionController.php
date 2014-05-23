<?php

namespace Ljms\AdminBundle\Controller;

use Ljms\CoreBundle\Entity\Division;
use Ljms\CoreBundle\Form\DivisionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Umbrellaweb\Bundle\UsefulAnnotationsBundle\Annotation\CsrfProtector;
use Ljms\CoreBundle\Component\Pagination\Pagination;
    /**
     * DivisionController - edit/delete operations for backend-users (admins)
     * @Route("admin/divisions")
     */
class DivisionController extends Controller
{
    /**
     * @Route("", name="division_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $divisions=false;
        $pagination=false;
        $page = ($request->get('page')!==null) ? $request->get('page') : 1;
        $limit = ($request->get('limit')!==null) ? $request->get('limit') : 10;
        $filter['division'] = ($request->get('division')) ? $request->get('division') : 'all';
        $filter['status'] = ($request->get('status')) ? $request->get('status') : 'all';
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')){
            $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->findDivisions($filter,$page,$limit);
        }else{
            $id=$this->getUser()->getId();
            $paginator=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->findDivisions($filter,$page,$limit,$id);
        }
        if ($paginator!=false){
            if ($limit!='all'){
                $pagination= new Pagination();
                $pagination=$pagination->generate($paginator,$page);
            }
            $divisions=$paginator->getQuery()->getResult();
        }
        return array (
            'divisions'=>$divisions,
            'filter'=>$filter,
            'pagination'=>$pagination,
            'page'=>$page,
            'limit'=>$limit,
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisionList(),
            'csrf' => $this->get('form.csrf_provider')->generateCsrfToken('delete_division')
        );
    }
    /**
     * Add new division
     * @Route("/add", name="division_add")
     * @Template()
     */
    public function addAction(Request $request){
        $division = new Division();
        $form = $this->createForm(new DivisionType(), $division);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($division);
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            $request->getSession()->getFlashBag()->add('success', 'New division has been added.');
            return $this->redirect($this->generateUrl('division_index'));
        }
        return array(
            'method'=>'add',
            'form'=>$form->createView(),
        );
    }
    /**
     * Edit division
     * @Route("/edit/{id}", name="division_edit")
     * @Template("LjmsAdminBundle:Division:add.html.twig")
     * @ParamConverter("division", class="LjmsCoreBundle:Division")
     */
    public function editAction(Request $request,$division){
        if ((!$this->get('security.context')->isGranted('ROLE_ADMIN'))and($division->getProfile()->getId()!=$this->getUser()->getId())){
            return $this->redirect($this->generateUrl('division_index'));
        }
        if (!$division) {
            throw $this->createNotFoundException(
                'No profile found for id '.$division->getId()
            );
        }
        $form = $this->createForm(new DivisionType(), $division);
        $form->handleRequest($request);
        if ($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            try{
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
            $request->getSession()->getFlashBag()->add('success', 'Division successfully modified.');
            return $this->redirect($this->generateUrl('division_index'));
        }
        return array(
            'method'=>'edit',
            'form'=>$form->createView(),
            'photo'=>$division->getWebPath(),
            'edit_id'=>$division->getId(),
        );
    }
    /**
     * @Route("/delete/{id}", name="division_delete")
     * @Method("DELETE")
     * @CsrfProtector(intention="delete_division", name="_token")
     * @ParamConverter("division", class="LjmsCoreBundle:Division")
     */
    public function deleteAction(Request $request,$division){
        $em=$this->getDoctrine()->getManager();
        $this->_checkRole($division);
        $em->remove($division);
        try{
            $em->flush();
        }catch(\Exception $e){
            $request->getSession()->getFlashBag()->add('error', $e->getMessage());
        }
        $request->getSession()->getFlashBag()->add('success', 'Division successfully deleted.');
        return $this->redirect($this->generateUrl('division_index'));
    }
    /**
     * Multiple delete,edit status
     * @Route("/group", name="division_group")
     */
    public function groupAction(Request $request)
    {
        if ($request->request->get('check')){
            $check=$request->request->get('check');
            switch ($request->request->get('action_select')){
                case 'active':
                    $this->active($check,1);
                    $request->getSession()->getFlashBag()->add('success', 'Divisions Status successfully modified.');
                    break;
                case 'inactive':
                    $this->active($check,0);
                    $request->getSession()->getFlashBag()->add('success', 'Divisions Status successfully modified.');
                    break;
                case 'delete':
                    $em=$this->getDoctrine()->getManager();
                    $divisions=$em->getRepository('LjmsCoreBundle:Division')->findBy(array('id'=>$check));
                    foreach($divisions as $division){
                        $em->remove($division);
                    }
                    try{
                        $em->flush();
                    }catch(\Exception $e){
                        $request->getSession()->getFlashBag()->add('error', $e->getMessage());
                    }
                    $request->getSession()->getFlashBag()->add('success', 'Divisions successfully deleted.');
                    break;
            }
        }
        return $this->redirect($this->generateUrl('division_index'));
    }

    /**
     * Multiple change status
     * @param array $check
     * @param boolean $is_active
     */
    private function active($check,$is_active)
    {
        $em=$this->getDoctrine()->getManager();
        $divisions=$em->getRepository('LjmsCoreBundle:Division')->findBy(array('id'=>$check));
        foreach($divisions as $division){
            $division->setIsActive($is_active);
        }
        $em->flush();
    }
    /**
     * Get division list for change director
     * @Route("/get", name="division_get")
     */
    public function getAction(){
        $division_list=$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions();
        return new Response(json_encode($division_list));
    }
    /**
     * Ajax upload photo
     * @Route("/logo", name="division_add_logo")
     */
    public function addLogoAction(Request $request){
        $file=$request->files->get('logo');
        $division= new Division();
        $dir=$this->container->getParameter('temp_dir');
        return new Response($request->getBaseUrl().'/../'.$division->uploadLogo($file,$dir));
    }
    private function _checkRole($division){
        $director_profile=$division->getProfile();
        if ($director_profile!==null and count($director_profile->getDivisions())==1){
            $roles=$director_profile->getRoles();
            foreach ($roles as $role){
                if ($role->getName()=='Director'){
                    $director_profile->removeRole($role);
                }
            }
        }
        $teams=$division->getTeams();
        if ($teams!==null){
            foreach ($teams as $team){
                $coach_profile=$team->getCoachProfile();
                if ($coach_profile!==null and count($coach_profile->getCoachTeams())==1){
                    $roles=$coach_profile->getRoles();
                    foreach ($roles as $role){
                        if ($role->getName()=='Coach'){
                            $coach_profile->removeRole($role);
                        }
                    }
                }
                $manager_profile=$team->getManagerProfile();
                if ($manager_profile!==null and count($manager_profile->getManagerTeams())==1){
                    $roles=$manager_profile->getRoles();
                    foreach ($roles as $role){
                        if ($role->getName()=='Manager'){
                            $manager_profile->removeRole($role);
                        }
                    }
                }
            }
        }
    }
}
?>