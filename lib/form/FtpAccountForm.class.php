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
        $this->validatorSchema['up_bandwidth'] = new sfValidatorNumber(array('min'=>50000, 'max'=>100000));        
        $this->validatorSchema['down_bandwidth'] = new sfValidatorNumber(array('min'=>50000, 'max'=>100000));       
        $this->validatorSchema['quota_files'] = new sfValidatorNumber(array('min'=>5, 'max'=>100)); 
        $this->validatorSchema['quota_size'] = new sfValidatorNumber(array('min'=>5000, 'max'=>10000)); 
        $this->validatorSchema['ip_access'] = new sfValidatorRegex(
                array('pattern'=>'/\b(?:\d{1,3}\.){3}\d{1,3}\b|\*/')
              );
  }
       
}
