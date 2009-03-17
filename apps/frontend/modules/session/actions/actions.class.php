<?php

/**
 * session actions.
 *
 * @package    uas
 * @subpackage session
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class sessionActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    $this->redirect('session/login');
  }
  public function executeLogin(sfWebRequest $request)
   {
    $username = $request->getParameter('username');
	$password = $request->getParameter('password');
if  ($username == 'admin' && $password == 'pa55w0rd'){
	$this->getUser()->setAuthenticated(true);
	$this->getUser()->setFlash('notice', 'Welcome admin');
	$this->redirect('@user');
   }
}
    public function executeShow(sfWebRequest $request){
		
	}

	public function executeLogout(sfWebRequest $request)
	{
		$this->getUser()->setAuthenticated(false);
		$this->getUser()->setFlash('notice', 'You have been logged out!');
		$this->redirect('@user');
	}
	  
 }


