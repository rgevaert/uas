<?php

/**
* Embedded form form UNIX Accounts
*/
class EmbeddedUnixAccountForm extends UnixAccountForm
{
	
	function configure()
	{
		parent::configure();

		unset($this['created_at'], $this['updated_at']);
		$this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
	}
}
