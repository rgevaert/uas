<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * User filter form base class.
 *
 * @package    uas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'domainname_id'      => new sfWidgetFormPropelChoice(array('model' => 'Domainname', 'add_empty' => true)),
      'name'               => new sfWidgetFormFilterInput(),
      'fathers_name'       => new sfWidgetFormFilterInput(),
      'grand_fathers_name' => new sfWidgetFormFilterInput(),
      'login'              => new sfWidgetFormFilterInput(),
      'phone'              => new sfWidgetFormFilterInput(),
      'nt_password'        => new sfWidgetFormFilterInput(),
      'lm_password'        => new sfWidgetFormFilterInput(),
      'crypt_password'     => new sfWidgetFormFilterInput(),
      'unix_password'      => new sfWidgetFormFilterInput(),
      'gid'                => new sfWidgetFormFilterInput(),
      'uid'                => new sfWidgetFormFilterInput(),
      'status'             => new sfWidgetFormFilterInput(),
      'alternate_email'    => new sfWidgetFormFilterInput(),
      'email_local_part'   => new sfWidgetFormFilterInput(),
      'email_quota'        => new sfWidgetFormFilterInput(),
      'expires_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'domainname_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Domainname', 'column' => 'id')),
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
      'expires_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

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
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
