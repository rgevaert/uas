<?php

/**
 * Domainname form.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class DomainnameForm extends BaseDomainnameForm
{
  public function configure()
  {
    $this->validatorSchema['name'] = new sfValidatorRegex( array ('pattern' => '/((?:[-a-z0-9]+\.)+[a-z]{2,})$/i' ));
  }
}
