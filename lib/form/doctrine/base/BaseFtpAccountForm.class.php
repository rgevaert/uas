<?php

/**
 * FtpAccount form base class.
 *
 * @method FtpAccount getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseFtpAccountForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'up_bandwidth'   => new sfWidgetFormInputText(),
      'down_bandwidth' => new sfWidgetFormInputText(),
      'ip_access'      => new sfWidgetFormInputText(),
      'quota_size'     => new sfWidgetFormInputText(),
      'quota_files'    => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'up_bandwidth'   => new sfValidatorInteger(array('required' => false)),
      'down_bandwidth' => new sfValidatorInteger(array('required' => false)),
      'ip_access'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'quota_size'     => new sfValidatorInteger(array('required' => false)),
      'quota_files'    => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ftp_account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FtpAccount';
  }

}
