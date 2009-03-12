<?php

/**
 * FtpAccount form base class.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseFtpAccountForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'user_id'        => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => false)),
      'up_bandwidth'   => new sfWidgetFormInput(),
      'down_bandwidth' => new sfWidgetFormInput(),
      'ip_access'      => new sfWidgetFormInput(),
      'quota_size'     => new sfWidgetFormInput(),
      'quota_files'    => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'FtpAccount', 'column' => 'id', 'required' => false)),
      'user_id'        => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id')),
      'up_bandwidth'   => new sfValidatorInteger(array('required' => false)),
      'down_bandwidth' => new sfValidatorInteger(array('required' => false)),
      'ip_access'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'quota_size'     => new sfValidatorInteger(array('required' => false)),
      'quota_files'    => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ftp_account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FtpAccount';
  }


}
