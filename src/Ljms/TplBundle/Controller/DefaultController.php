<?php

namespace Ljms\TplBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LjmsTplBundle:Default:index.html.twig', array('name' => $name));
    }
}
