<?php
	namespace Ljms\AdminBundle\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Security\Core\SecurityContext;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class SecurityController extends Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('LjmsAdminBundle:Security:login.html.twig', array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
            'division_list' => $this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions(),
            'ajaxUrl'=>'home_get_schedule',
            'url'=>'home_schedule'
        ));
    }
    /**
     * Recover password
     * @Route("/forgot", name="security_recover")
     * @Template()
     */
    public function recoverAction(Request $request){
        $message=null;
        $new_password=false;
        $em=$this->getDoctrine()->getManager();
        if ($request->get('token')!=null){
            $token=$request->get('token');
            $user=$em->getRepository('LjmsCoreBundle:Profile')->findBy(array('verification'=>$token));
            if ($user[0]!==null){
                $pass=$user[0]->confirmPassword();
                $em->flush();
                $this->sendPassword($user[0]->getEmail(),$pass);
                $new_password=true;
            }
        }
        if ($request->get('email')!==null){
            $email=$request->get('email');
            $user=$em->getRepository('LjmsCoreBundle:Profile')->findBy(array('email'=>$email));
            if ($user[0]!== null and $user[0]->generateToken()){
                $em->flush();
                $this->sendToken($email,$user[0]->getVerification());
                $message=true;
            }else{$message=false;}
        }
        return array(
            'division_list' => $this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions(),
            'ajaxUrl'=>'home_get_schedule',
            'url'=>'home_schedule',
            'message'=>$message,
            'new_password'=>$new_password,
        );
    }

    /**
     * Send verification token to user email
     * @param $email
     * @param $token
     */
    private function sendToken($email,$token){
        $link=$this->generateUrl('security_recover',array('token'=>$token),true);
        $message = \Swift_Message::newInstance()
            ->setSubject('Forgot Password')
            ->setFrom('send@example.com')
            ->setTo($email)
            ->setBody($link)
        ;
        $this->get('mailer')->send($message);
    }

    /**
     * Send new password to user email
     * @param $email
     * @param $password
     */
    private function sendPassword($email,$password){
        $message = \Swift_Message::newInstance()
            ->setSubject('New Password')
            ->setFrom('send@example.com')
            ->setTo($email)
            ->setBody($password)
        ;
        $this->get('mailer')->send($message);
    }
}

?>