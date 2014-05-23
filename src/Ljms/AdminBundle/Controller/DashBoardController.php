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
 * @Route ("admin/dashboard")
 */
class DashBoardController extends Controller
{
    /**
     * @Route("", name="dashboard_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $id=$this->getUser()->getId();
        $profile = $em->getRepository('LjmsCoreBundle:Profile')->find($id);
        return array(
            'profile'=>$profile,
        );
    }
}
?>