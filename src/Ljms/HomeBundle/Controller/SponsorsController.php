<?php
    namespace Ljms\HomeBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;
    class SponsorsController extends Controller
{
    public function indexAction()
    {
        return $this->render(
                'LjmsHomeBundle:Home:sponsors.html.twig'
            );
    }
}

?>