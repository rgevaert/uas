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
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new RegisterUserForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $user = $form->save();

      $this->redirect('register/confirm');
    } else {
		var_dump($form);
	}
  }
}
