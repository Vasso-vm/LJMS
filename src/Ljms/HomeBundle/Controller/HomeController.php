<?php
	namespace Ljms\HomeBundle\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;


    class HomeController extends Controller
    {

        public function indexAction(Request $request)
        {
            return $this->render(
        		'LjmsHomeBundle:Home:index.html.twig',array('url'=>'schedule_get')
            );
        }

        public function getAction(Request $request){
            $year=$request->request->get('year');
            $month=$request->request->get('month')+1;
            $schedule=$this->getDoctrine()->getRepository('LjmsCoreBundle:Schedule')->getSchedules($year,$month);
            return new Response(json_encode($schedule));
        }
    }

?>