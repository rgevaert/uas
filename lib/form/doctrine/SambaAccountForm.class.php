<?php
/**
* SambaAccount form.
*
* @package    uas
* @subpackage form
* @author     Your name here
* @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
*/
class SambaAccountForm extends BaseSambaAccountForm
{
	public function configure(){
		unset($this['created_at'], $this['updated_at']);

		$this->validatorSchema['hostname'] = new sfValidatorRegex(array('pattern'=>('/^(?:[-a-z0-9]+\.)+[a-z]{2,}$/')));
	}
}