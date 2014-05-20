<?php
namespace Ljms\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ljms\HomeBundle\Form\ContactType;

/**
 * AboutController - edit/delete operations for backend-users (admins)
 * @Route("/contact")
 */
class ContactController extends Controller
{
    /**
     * @Route("", name="contact_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new ContactType());
        $form->handleRequest($request);
            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom($form->get('email')->getData())
                    ->setTo($this->container->getParameter('admin_email'))
                    ->setBody('<p>'.$form->get('name')->getData().'</p>'.'<p>'.$form->get('message')->getData().'</p>');
                $this->get('mailer')->send($message);
                $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');
                return $this->redirect($this->generateUrl('contact_index'));
            }
        return array(
            'division_list'=>$this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions(),
            'form'=> $form->createView(),
        );
    }
}

?>