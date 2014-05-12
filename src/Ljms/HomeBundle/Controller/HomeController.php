<?php
	namespace Ljms\HomeBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;



    /**
     * HomeController - edit/delete operations for backend-users (admins)
     * @Route("/home")
     */
    class HomeController extends Controller
    {
        /**
         * @Route("", name="home_index")
         * @Template()
         */
        public function indexAction(Request $request)
        {
            return array(
                'ajaxUrl'=>'home_get_schedule',
                'url'=>'home_schedule'
            );
        }
        /**
         * @Route("/get", name="home_get_schedule")
         * @Template()
         */
        public function getAction(Request $request){
            $year=$request->request->get('year');
            $month=$request->request->get('month')+1;
            $schedule=$this->getDoctrine()->getRepository('LjmsCoreBundle:Schedule')->getSchedules($year,$month);
            return new Response(json_encode($schedule));
        }
        /**
         * @Route("/schedule/{year}/{month}/{day}", name="home_schedule")
         * @Template()
         */
        public function scheduleAction(Request $request,$year,$month,$day){

            return array(
                'schedule'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Schedule')->findGames($year,$month,$day),
                'ajaxUrl'=>'home_get_schedule',
                'url'=>'home_schedule'
            );
        }
    }

?>