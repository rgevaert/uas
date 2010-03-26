<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'domainname_id'      => new sfWidgetFormPropelChoice(array('model' => 'Domainname', 'add_empty' => false)),
      'name'               => new sfWidgetFormInputText(),
      'fathers_name'       => new sfWidgetFormInputText(),
      'grand_fathers_name' => new sfWidgetFormInputText(),
      'login'              => new sfWidgetFormInputText(),
      'phone'              => new sfWidgetFormInputText(),
      'nt_password'        => new sfWidgetFormInputText(),
      'lm_password'        => new sfWidgetFormInputText(),
      'crypt_password'     => new sfWidgetFormInputText(),
      'unix_password'      => new sfWidgetFormInputText(),
      'gid'                => new sfWidgetFormInputText(),
      'uid'                => new sfWidgetFormInputText(),
      'status'             => new sfWidgetFormInputText(),
      'alternate_email'    => new sfWidgetFormInputText(),
      'email_local_part'   => new sfWidgetFormInputText(),
      'email_quota'        => new sfWidgetFormInputText(),
      'expires_at'         => new sfWidgetFormDateTime(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'domainname_id'      => new sfValidatorPropelChoice(array('model' => 'Domainname', 'column' => 'id')),
      'name'               => new sfValidatorString(array('max_length' => 255)),
      'fathers_name'       => new sfValidatorString(array('max_length' => 255)),
      'grand_fathers_name' => new sfValidatorString(array('max_length' => 255)),
      'login'              => new sfValidatorString(array('max_length' => 50)),
      'phone'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nt_password'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lm_password'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'crypt_password'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'unix_password'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'gid'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'uid'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'status'             => new sfValidatorString(array('max_length' => 20)),
      'alternate_email'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_local_part'   => new sfValidatorString(array('max_length' => 255)),
      'email_quota'        => new sfValidatorString(array('max_length' => 32)),
      'expires_at'         => new sfValidatorDateTime(),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'User', 'column' => array('login'))),
        new sfValidatorPropelUnique(array('model' => 'User', 'column' => array('uid'))),
        new sfValidatorPropelUnique(array('model' => 'User', 'column' => array('email_local_part', 'domainname_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }


}
