<?php

/**
 * User form.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
        'choices' => UserPeer::$status_types,
        'expanded' => true,
    ));
    $this->validatorSchema['status'] = new sfValidatorChoice(array(
        'choices' => array_keys(UserPeer::$status_types),
    ));
  }
}
