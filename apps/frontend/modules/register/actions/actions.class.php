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
    
        if($this->user->getGeneratedPassword()){
            $this->getUser()->setFlash('generated_pass', $this->user->getGeneratedPassword());        
            $this->getUser()->setAuthenticated(true);
            $this->getUser()->setAttribute('user_id' , $this->user->getId());     
            $this->getUser()->setFlash('notice', 'Welcome'. ' ' . $this->user);
            $this->redirect('user/show?id='.$this->user->getId());
	    } else {
		    $this->getUser()->setFlash('notice', 'Error in form');
	        $this->setTemplate('new'); // don't render createSuccess.php, but newSuccess.php
    	}
	}
	$this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $this->user = $form->save();
	  return true;
    } else {
	  return false;
	}
  }
}
