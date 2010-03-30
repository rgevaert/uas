<?php

/**
 * FtpAccount filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseFtpAccountFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'up_bandwidth'   => new sfWidgetFormFilterInput(),
      'down_bandwidth' => new sfWidgetFormFilterInput(),
      'ip_access'      => new sfWidgetFormFilterInput(),
      'quota_size'     => new sfWidgetFormFilterInput(),
      'quota_files'    => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'up_bandwidth'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'down_bandwidth' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ip_access'      => new sfValidatorPass(array('required' => false)),
      'quota_size'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quota_files'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ftp_account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

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
