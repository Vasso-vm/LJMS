<?php
	namespace Ljms\HomeBundle\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
    
    
	class HomeController extends Controller
    {
        public function indexAction()
        {
            $hash=hash('md5','admin');
            return $this->render(
        		'LjmsHomeBundle:Home:index.html.twig'
            );
        }
    }

?>