<?php
	namespace Ljms\HomeBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Response;
	class AboutController extends Controller
{
    public function indexAction()
    {
        return $this->render(
        		'LjmsHomeBundle:Home:about.html.twig'
        	);
    }
}

?>