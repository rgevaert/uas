<?php

require_once dirname(__FILE__).'/../lib/userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/userGeneratorHelper.class.php';

/**
 * user actions.
 *
 * @package    uas
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class userActions extends autoUserActions
{
    public function executeListToggleStatus(sfWebRequest $request)
    {
        //$user = UserPeer::retrieveByPk($request->getParameter('id'));
       // $user = $this->getRoute()->getObject();
        $id = $request->getParameter('id'); 
        $user = Doctrine::getTable('User')->find($id);
       
        $user->ToggleStatus();
        $this->getUser()->setFlash('notice', 'Status is changed successfully.');
        $this->redirect('@user');  
    } 
    public function executeBatchToggle_status(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids'); 
		$users = Doctrine::getTable('User')->createQuery('q')->whereIn('id', $ids)->execute();
        foreach ($users as $user)
        {
            $user->ToggleStatus();        
        }
       $this->getUser()->setFlash('notice', 'Status is changed successfully.');
       $this->redirect('@user');
    }
    public function executeListShow(sfWebRequest $request)
	{      
        $this->user = $this->getRoute()->getObject();
        $this->getUser()->addUserToHistory($this->user); 
    }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->user = $this->getRoute()->getObject();
    $user->delete();

    $this->redirect('user/index');
  }

  public function executeResetpassword(sfWebRequest $request)
  {
    // Get the current user
    $this->user = $this->getRoute()->getObject();

    // Set the password
    $password = new Password();
	$this->user->setPasswordObject($password);

    // Flash message
    $generated_pass = $password->getPassword();
    $this->getUser()->setFlash('generated_pass', $generated_pass);
    $this->getUser()->setFlash('notice', "User password has been reset");

    // Redirect the user back to the user's page
    $this->redirect('user/ListShow?id='.$this->user->getId());
  }


  public function executeListExtend(sfWebRequest $request)
  {
        $id = $request->getParameter('id'); 
        $this->user = $this->getRoute()->getObject();
       
        $this->user->displayExtendExpiresAt();
        $this->getUser()->setFlash('notice', 'Account expriry time has been extended successfully.');
        $this->redirect('user/ListShow?id='.$id);    
  }

  public function executeListDelete(sfWebRequest $request)
  {
        /*$id = $request->getParameter('id'); 
        $user = UserPeer::retrieveByPk($id);
       
        $user->listDelete();
        $this->getUser()->setFlash('notice', 'User Account has been Deleted from Database');
        $this->redirect('@user');*/
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@user');   
  }

	public function executeEdit(sfWebRequest $request)
	{
		$user = $this->getRoute()->getObject();
		
		// SAMBA FORM		
		$this->samba_form = new EmbeddedSambaAccountForm();
		$this->samba_form->setDefault('user_id', $user->getId());

		// FTP FORM
		$this->ftp_form	  = new EmbeddedFtpAccountForm();
		$this->ftp_form->setDefault('user_id', $user->getId());

		// UNIX FORM
		$this->unix_form	  = new EmbeddedUnixAccountForm();
		$this->unix_form->setDefault('user_id', $user->getId());

		return parent::executeEdit($request);
	}
}


