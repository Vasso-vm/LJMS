<?php
	namespace Ljms\AdminBundle\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Security\Core\SecurityContext;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class AdminController extends Controller
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
        return $this->render('LjmsAdminBundle:Admin:login.html.twig', array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
            'division_list' => $this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions(),
            'ajaxUrl'=>'home_get_schedule',
            'url'=>'home_schedule'
        ));
    }
    /**
     * @Route("/forgot", name="admin_recover")
     * @Template()
     */
    public function recoverAction(Request $request){
        $message=null;
        $new_password=false;
        if ($request->get('token')!=null){
            $token=$request->get('token');
            $this->confirmPassword($token);
            $new_password=true;
        }
        if ($request->get('email')!==null){
            $email=$request->get('email');
            $message=$this->generateToken($email);
        }
        return array(
            'division_list' => $this->getDoctrine()->getRepository('LjmsCoreBundle:Division')->getDivisions(),
            'ajaxUrl'=>'home_get_schedule',
            'url'=>'home_schedule',
            'message'=>$message,
            'new_password'=>$new_password
        );
    }
    private function generateToken($email){
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('LjmsCoreBundle:Profile')->findBy(array('email'=>$email));
        if ($user!=null){
           $token=md5($this->GeneratePassword(6));
           $user[0]->setVerification($token);
           $em->flush();
           $this->sendToken($email,$token);
           return true;
        }
        return false;
    }
    private function GeneratePassword($length){
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++){
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }
    private function sendToken($email,$token){
        $link='http://127.0.0.2/web/app_dev.php/forgot?token='.$token;
        $message = \Swift_Message::newInstance()
            ->setSubject('Forgot Password')
            ->setFrom('send@example.com')
            ->setTo($email)
            ->setBody($link)
        ;
        $this->get('mailer')->send($message);
    }
    private function confirmPassword($token){
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('LjmsCoreBundle:Profile')->findBy(array('verification'=>$token));
        if ($user!=null){
            $pass=$this->GeneratePassword(6);
            $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
            $password = $encoder->encodePassword($pass, $user[0]->getSalt());
            $user[0]->setPassword($password);
            $user[0]->setVerification(null);
            $em->flush();
            $this->sendPassword($user[0]->getEmail(),$pass);
            return true;
        }
    }
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