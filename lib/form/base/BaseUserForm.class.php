<?php

/**
 * User form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'domainname_id'      => new sfWidgetFormPropelChoice(array('model' => 'Domainname', 'add_empty' => false)),
      'name'               => new sfWidgetFormInput(),
      'fathers_name'       => new sfWidgetFormInput(),
      'grand_fathers_name' => new sfWidgetFormInput(),
      'login'              => new sfWidgetFormInput(),
      'phone'              => new sfWidgetFormInput(),
      'nt_password'        => new sfWidgetFormInput(),
      'lm_password'        => new sfWidgetFormInput(),
      'crypt_password'     => new sfWidgetFormInput(),
      'unix_password'      => new sfWidgetFormInput(),
      'gid'                => new sfWidgetFormInput(),
      'uid'                => new sfWidgetFormInput(),
      'status'             => new sfWidgetFormInput(),
      'alternate_email'    => new sfWidgetFormInput(),
      'email_local_part'   => new sfWidgetFormInput(),
      'email_quota'        => new sfWidgetFormInput(),
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
      'gid'                => new sfValidatorInteger(),
      'uid'                => new sfValidatorInteger(),
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
