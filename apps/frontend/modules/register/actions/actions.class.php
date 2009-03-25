<?php

/**
 * register actions.
 *
 * @package    uas
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class registerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->redirect('register/new');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RegisterUserForm();
  }

  public function executeConfirm(sfWebRequest $request)
  {      
        $this->user = UserPeer::retrieveByPk($request->getParameter('id'));  
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new RegisterUserForm();

    if($this->processForm($request, $this->form)){
    	$this->getUser()->setAuthenticated(true);
    	$this->getUser()->setAttribute('user_id' , $user->getId());     
		$this->getUser()->setFlash('notice', 'Welcome'. ' ' . $user->getLogin());
    	$this->redirect('user/show?id='.$user->getId());
	} else {
		$this->getUser()->setFlash('notice', 'Error in form');
	    $this->setTemplate('new'); // don't render createSuccess.php, but newSuccess.php
	}
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $user = $form->save();

	  if($user->getGeneratedPassword()){
		  $this->getUser()->setFlash('generated_pass', $user->getGeneratedPassword());        
	  }
	  return true;
    } else {
	  return false;
	}
  }
}
