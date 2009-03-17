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
	$password = $request->getParameter('password');

    if($username){
        $this->getUser()->setFlash('error','User Name / Password Do not match');
    }
    if(!$username AND !$password){
        $this->getUser()->setFlash('error','You must provide User name and Password');
    }
    if(!$username){
        $this->getUser()->setFlash('error','You must provide User name ');
    }
    if(!$password){
        $this->getUser()->setFlash('error','You must provide Password');
    }
	if($username == 'admin' && $password == 'adminpass'){
		// the username & password are correct
		// log the user in...
		$this->getUser()->setAuthenticated(true);
		$this->getUser()->addCredential('admin');

		// redirect him away from this login page...
		$this->getUser()->setFlash('notice', 'Welcome, admin');
                $this->getUser()->setFlash('error','');
		$this->redirect('@user');

	} elseif($username == 'secretary' && $password == 'secret'){
		$this->getUser()->setAuthenticated(true);
		$this->getUser()->addCredential('secretary');

		$this->getUser()->setFlash('notice', 'Welcome, secretary');
		$this->redirect('@user');
	}
    
  }
  
	public function executeLogout(sfWebRequest $request)
	{
		$this->getUser()->setAuthenticated(false);
		$this->getUser()->clearCredentials();

		$this->getUser()->setFlash('notice', 'You have been logged out!');
    		$this->redirect('session/login');
	}

}
