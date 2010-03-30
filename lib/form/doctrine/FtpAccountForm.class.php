<?php

/**
 * FtpAccount form.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class FtpAccountForm extends BaseFtpAccountForm
{
  public function configure()
  {
		unset($this['created_at'], $this['updated_at']);

        $this->validatorSchema['up_bandwidth'] = new sfValidatorInteger(array('min'=>0));        
        $this->validatorSchema['down_bandwidth'] = new sfValidatorInteger(array('min'=>0));       
        $this->validatorSchema['quota_files'] = new sfValidatorNumber(array('min'=>0)); 
        $this->validatorSchema['quota_size'] = new sfValidatorNumber(array('min'=>0)); 
        $this->validatorSchema['ip_access'] = new sfValidatorRegex(array('pattern'=>'/^\*$/'));
  }
                 
}





























































































































































































































































































































