<?php

/**
 * User filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'domainname_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DomainName'), 'add_empty' => true)),
      'name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fathers_name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'grand_fathers_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'login'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'              => new sfWidgetFormFilterInput(),
      'nt_password'        => new sfWidgetFormFilterInput(),
      'lm_password'        => new sfWidgetFormFilterInput(),
      'crypt_password'     => new sfWidgetFormFilterInput(),
      'unix_password'      => new sfWidgetFormFilterInput(),
      'gid'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'uid'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'alternate_email'    => new sfWidgetFormFilterInput(),
      'email_local_part'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email_quota'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'expires_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'sfguarduser_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'domainname_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('DomainName'), 'column' => 'id')),
      'name'               => new sfValidatorPass(array('required' => false)),
      'fathers_name'       => new sfValidatorPass(array('required' => false)),
      'grand_fathers_name' => new sfValidatorPass(array('required' => false)),
      'login'              => new sfValidatorPass(array('required' => false)),
      'phone'              => new sfValidatorPass(array('required' => false)),
      'nt_password'        => new sfValidatorPass(array('required' => false)),
      'lm_password'        => new sfValidatorPass(array('required' => false)),
      'crypt_password'     => new sfValidatorPass(array('required' => false)),
      'unix_password'      => new sfValidatorPass(array('required' => false)),
      'gid'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'uid'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'             => new sfValidatorPass(array('required' => false)),
      'alternate_email'    => new sfValidatorPass(array('required' => false)),
      'email_local_part'   => new sfValidatorPass(array('required' => false)),
      'email_quota'        => new sfValidatorPass(array('required' => false)),
      'expires_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'sfguarduser_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'domainname_id'      => 'ForeignKey',
      'name'               => 'Text',
      'fathers_name'       => 'Text',
      'grand_fathers_name' => 'Text',
      'login'              => 'Text',
      'phone'              => 'Text',
      'nt_password'        => 'Text',
      'lm_password'        => 'Text',
      'crypt_password'     => 'Text',
      'unix_password'      => 'Text',
      'gid'                => 'Number',
      'uid'                => 'Number',
      'status'             => 'Text',
      'alternate_email'    => 'Text',
      'email_local_part'   => 'Text',
      'email_quota'        => 'Text',
      'expires_at'         => 'Date',
      'sfguarduser_id'     => 'ForeignKey',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
