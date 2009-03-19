<?php

/**
 * user actions.
 *
 * @package    uas
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class userActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
   // $this->user_list = UserPeer::doSelect(new Criteria());
   $this->redirect('session/logout');
  }
  public function executeShow(sfWebRequest $request)
  {
    $current_id = $this->getUser()->getAttribute('user_id');
    $requested_id= $request->getParameter('id');
    
    if($current_id == $requested_id )
    {       
    $this->user = UserPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->user);
    }
    else
    {     
        $this->getUser()->setFlash('notice', 'Please View Your Details Only!');       
        $this->redirect('user/show?id='.$current_id);
    }
  }
  public function executeEdit(sfWebRequest $request)
  {
    $current_id = $this->getUser()->getAttribute('user_id');
    $requested_id= $request->getParameter('id');
    
   if($current_id == $requested_id )
    { 
    $this->forward404Unless($user = UserPeer::retrieveByPk($request->getParameter('id')), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontendUserForm($user);
    }
    else
    {       
        $this->redirect('user/edit?id='.$current_id);
    }
  }
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($user = UserPeer::retrieveByPk($request->getParameter('id')), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontendUserForm($user);
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $user = $form->save();
      $this->redirect('user/edit?id='.$user->getId());
    }
  }
}
