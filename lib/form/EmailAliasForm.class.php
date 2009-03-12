<?php

/**
 * EmailAlias form.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EmailAliasForm extends BaseEmailAliasForm
{
  public function configure()
  {
        $this->validatorSchema['destination'] = new sfValidatorEmail();
        $this->validatorSchema['local_part'] = new sfValidatorRegex(array(
         'pattern'=>'/^[a-zA-Z0-9-\._]+$/'));
        //$this->validatorSchema['local_part'] = new sfValidatorNumber(array('max'=>20, 'min'=>10));
  }
}
