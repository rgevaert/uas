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

    $user_login = sfConfig::get('app_admin');
    if(in_array($username, $user_login))
    {
       // Getting the user object
       $c = new Criteria();
       $c->add(UserPeer::LOGIN, $username);
       $this->user = UserPeer::doSelectOne($c);
       $password = new Password($user_password);  
       if($this->user->checkPassword($password))
       {
             // log the user in...
             $this->getUser()->setAuthenticated(true);
             $this->getUser()->addCredential('admin');

             // redirect him away from this login page...
             $this->getUser()->setFlash('notice', 'Welcome, admin');
             $this->redirect('@user');
       }

     }
     else
     {
        $this->getUser()->setFlash('eror', 'You are not an administrator');
        //$this->redirect('session/login');         
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
