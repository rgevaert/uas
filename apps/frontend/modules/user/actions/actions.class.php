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
    $current_id = $this->getUser()->getAttribute('user_id');
    $this->redirect('user/edit?id='.$current_id);
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
  public function executeChangepassword(sfWebRequest $request)
  {
        $this->user = UserPeer::retrieveByPk($request->getParameter('id'));
        
        $new_password= $this->getRequestParameter('new_password');
        $confirm_password= $this->getRequestParameter('confirm_password');
        $password= $this->getRequestParameter('password');
        if(!$new_password)
        {
                $this->getUser()->setFlash('error',
                        'Please provide new password');
        }
        else if(!$confirm_password)
        {
                $this->getUser()->setFlash('error',
                       'Please provide confirm password');
        }
        else if(!$password)
        {
                $this->getUser()->setFlash('error',
                       'Please provide your current password');                
        }
        else
        {
                if($new_password == $confirm_password) 
                {
                     $c = new Criteria();
                      
                     $c->add(UserPeer::ID,$this->user->getId());
                      
                     $c->add(UserPeer::CRYPT_PASSWORD,$new_password);
                     $c->add(UserPeer::LM_PASSWORD,$new_password);
                     $c->add(UserPeer::UNIX_PASSWORD,$new_password);
                     $c->add(UserPeer::NT_PASSWORD,$new_password);
                      
                     UserPeer::doUpdate($c);
                     $this->getUser()->setFlash('notice',
                     'Password Changed Successfuly'); 
                      
                     $this->redirect('user/show?id='.$this->user->getId());          
                }
                else
                {
                     $this->getUser()->setFlash('error','Passwords must match');                
                }  
        }
  }
}
