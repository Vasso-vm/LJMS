<?php
    namespace Ljms\HomeBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * SponsorsController - edit/delete operations for backend-users (admins)
     * @Route("/sponsors")
     */
    class SponsorsController extends Controller
    {
        /**
         * @Route("", name="sponsors_index")
         * @Template()
         */
        public function indexAction()
        {
            return array(
                'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions(),
            );
        }
    }

?>