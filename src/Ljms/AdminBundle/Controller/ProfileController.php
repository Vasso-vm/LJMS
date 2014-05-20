<?php
namespace Ljms\AdminBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ljms\CoreBundle\Form\ProfileType;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ljms\CoreBundle\Entity\Profile;

/**
 * Class ProfileController
 * @Route ("admin/profile")
 */
class ProfileController extends Controller
{
        /**
         * @Route("", name="profile_index")
         * @Template()
         */
        public function indexAction(Request $request)
        {
            $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
            $em=$this->getDoctrine()->getManager();
            $id=$this->getUser()->getId();
            $profile = $em->getRepository('LjmsCoreBundle:Profile')->find($id);
            $form = $this->createForm(new ProfileType(), $profile);
            $form->handleRequest($request);
            if ($form->isValid()){
                $password = $encoder->encodePassword($profile->getPassword(), $profile->getSalt());
                $profile->setPassword($password);
                try{
                    $em->flush();
                }catch(\Exception $e){
                    $request->getSession()->getFlashBag()->add('error', $e->getMessage());
                }
                return $this->redirect($this->generateUrl('users_index'));
            }
            return array(
                'form'=>$form->createView(),
                'profile'=>$profile,
            );
        }
}
?>