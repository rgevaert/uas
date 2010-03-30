<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'domainname_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DomainName'), 'add_empty' => false)),
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
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'domainname_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DomainName'))),
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
      'status'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'alternate_email'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_local_part'   => new sfValidatorString(array('max_length' => 255)),
      'email_quota'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'expires_at'         => new sfValidatorDateTime(),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('login'))),
        new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('uid'))),
        new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('name', 'fathers_name', 'grand_fathers_name'))),
        new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('email_local_part', 'domainname_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
