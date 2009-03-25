<?php

/**
 * session actions.
 *
 * @package    jobeet
 * @subpackage session
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class sessionActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->redirect('session/login');
  }

  public function executeLogin(sfWebRequest $request)
  {
    $username = $request->getParameter('username');
    $user_password = $request->getParameter('password');

    if(!$username OR !$user_password)
    {
        $this->getUser()->setFlash('error','You must provide Username / Password');
    }

       // Getting the user object
       $c = new Criteria();
       $c->add(UserPeer::LOGIN, $username);
       $this->user = UserPeer::doSelectOne($c);    

       // Check the user in db
       if($this->user)
       {
            // check the user in app.yml
            $user_login_admin = sfConfig::get('app_admin');
            if(in_array($username, $user_login_admin))
            {       
                $user_is_authorized = true;
                $welcome = "Welcome Administrator";
                $credential = "admin";
                $redirect = '@user';
            }
            $user_login_sec = sfConfig::get('app_secretary');
            if(in_array($username, $user_login_sec))
            {
                $user_is_authorized = true;
                $welcome = "Welcome secretary";
                $credential = "secretary";
                $redirect = 'user/new';
            }


            if($user_is_authorized)
            {
                 $password = new Password($user_password);  
                 if($this->user->checkPassword($password))
                 {
                     // log the user in...
                     $this->getUser()->setAuthenticated(true);
                     $this->getUser()->addCredential($credential);
                     // redirect him away from this login page...
                     $this->getUser()->setFlash('notice', $welcome);
                     $this->redirect($redirect);                        
                 }
                 else
                 {
                      // Password Does't match
                      $this->getUser()->setFlash('error',
                      'Password Doest match');
                 }
             }
             else
             {
                 // You are not Authorized
                 $this->getUser()->setFlash('error',
                 'You are not Authorized');
             }
       }
       else
       {
             // User doesnot exist in db
             $this->getUser()->setFlash('error',
            'User doesnot exist in db');
       }
  }

  
  public function executeLogout(sfWebRequest $request)
  {
    $this->getUser()->setAuthenticated(false);
    $this->getUser()->clearCredentials();

    $this->getUser()->resetUserHistory();

    $this->getUser()->setFlash('notice', 'You have been logged out!');
    $this->redirect('session/login');
  }

  private function get_login_from_config(sfWebRequest $request)
  {
  
  }

}
