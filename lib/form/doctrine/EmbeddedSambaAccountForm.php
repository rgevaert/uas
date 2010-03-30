<?php

/**
* Embedded form form samba accounts
*/
class EmbeddedSambaAccountForm extends SambaAccountForm
{
	
	function configure()
	{
		parent::configure();

		unset($this['created_at'], $this['updated_at']);
		$this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
	}
}
