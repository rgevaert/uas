<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * FtpAccount filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseFtpAccountFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'        => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => true)),
      'up_bandwidth'   => new sfWidgetFormFilterInput(),
      'down_bandwidth' => new sfWidgetFormFilterInput(),
      'ip_access'      => new sfWidgetFormFilterInput(),
      'quota_size'     => new sfWidgetFormFilterInput(),
      'quota_files'    => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'user_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'User', 'column' => 'id')),
      'up_bandwidth'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'down_bandwidth' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ip_access'      => new sfValidatorPass(array('required' => false)),
      'quota_size'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quota_files'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('ftp_account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FtpAccount';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'user_id'        => 'ForeignKey',
      'up_bandwidth'   => 'Number',
      'down_bandwidth' => 'Number',
      'ip_access'      => 'Text',
      'quota_size'     => 'Number',
      'quota_files'    => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
