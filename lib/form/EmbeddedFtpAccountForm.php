<?php

/**
* Embedded form form FTP Account
*/
class EmbeddedFtpAccountForm extends FtpAccountForm
{
	
	function configure()
	{
		parent::configure();

		unset($this['created_at'], $this['updated_at']);
		$this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
	}
}
