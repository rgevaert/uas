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
        $user = UserPeer::retrieveByPk($id);
       
        $user->ToggleStatus();
        $this->getUser()->setFlash('notice', 'Status is changed successfully.');
        $this->redirect('@user');  
    } 
    public function executeBatchToggle_status(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids'); 
        $users = UserPeer::retrieveByPks($ids);
        foreach ($users as $user)
        {
            $user->ToggleStatus();        
        }
       $this->getUser()->setFlash('notice', 'Status is changed successfully.');
       $this->redirect('@user');
    }
    public function executeListShow(sfWebRequest $request)
{
       if (!$request->getParameter('sf_culture'))
        {
        if ($this->getUser()->isFirstRequest())
        {
            $culture = $request->getPreferredCulture(array('en', 'ti'));
            $this->getUser()->setCulture($culture);
            $this->getUser()->isFirstRequest(false);
        }
        else
        {
            $culture = $this->getUser()->getCulture();
        }
        $this->redirect('@localized_homepage');
        }
        
        $this->user = $this->getRoute()->getObject();
        $this->getUser()->addUserToHistory($this->user); 

        $ftps = $this->user->getFtpAccounts();
        $this->ftp_account = array_shift($ftps);

        $sambas = $this->user->getSambaAccounts();
        $this->samba_accounts = $sambas;

        $unixs = $this->user->getUnixAccounts();
        $this->unix_account = array_shift($unixs);
    
    }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($user = UserPeer::retrieveByPk($request->getParameter('id')), sprintf('Object  does not exist (%s).', $request->getParameter('id')));
    $user->delete();

    $this->redirect('user/index');
  }

  public function executeResetpassword(sfWebRequest $request)
  {
    // Get the current user
	$user = UserPeer::retrieveByPk($request->getParameter('id'));

    // Set the password
    $password = new Password();
	$user->setPassword($password);

    // Flash message
    $generated_pass = $password->getPassword();
    $this->getUser()->setFlash('generated_pass',$generated_pass);
    $this->getUser()->setFlash('notice', "User password has been reset");

    // Redirect the user back to the user's page
    $this->redirect('user/ListShow?id='.$current_id);
  }
  
	public function executeEdit(sfWebRequest $request)
	{
		$user = $this->getRoute()->getObject();
		
		$this->samba_form = new EmbeddedSambaAccountForm();
		$this->samba_form->setDefault('user_id', $user->getId());
		return parent::executeEdit($request);
	}
}


