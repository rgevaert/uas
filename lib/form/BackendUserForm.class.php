<?php

/**
	* BackendUser form.
	*
	* @package    uas
	* @subpackage form
	* @author     Your name here
	* @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
	*/
class BackendUserForm extends UserForm
{
	public function configure_specific()
	{
		parent::configure_specific();
		unset(
			$this['created_at'], $this['updated_at'],
			$this['login'], 
			$this['nt_password'], $this['lm_password'], $this['crypt_password'], $this['unix_password'],
			$this['email_local_part'],
			$this['gid'], $this['uid'],
			$this['domainname_id']
			); 

		if (!$this->isNew()) {  
			$user = $this->getObject();

			foreach ($user->getSambaAccounts() as $samba_account) {
				$this->embedForm('samba_account-' . $samba_account->getId(),  // name
				new EmbeddedSambaAccountForm($samba_account));  // form
			}		

			$new_sambaaccount_form = new EmbeddedSambaAccountForm();
			$new_sambaaccount_form->setDefault('user_id', $user->getId());
			$this->embedForm('new_samba_account', $new_sambaaccount_form);

			foreach ($user->getFtpAccounts() as $ftp_account) {
				$this->embedForm('ftp_account-' . $ftp_account->getId(),  // name
				new FtpAccountForm($ftp_account));  // form
			}		

		}	
	}

	public function bind(array $taintedValues = null, array $taintedFiles = null) {  
		// remove the embedded new form if the name field was not provided  
		if (is_null($taintedValues['new_samba_account']['hostname']) || strlen($taintedValues['new_samba_account']['hostname']) === 0 ) {    
			unset($this->embeddedForms['new_samba_account'], $taintedValues['new_samba_account']);  
			$this->validatorSchema['new_samba_account'] = new sfValidatorPass();  
		}  

		// call parent bind method  
		parent::bind($taintedValues, $taintedFiles);    
	}
}
