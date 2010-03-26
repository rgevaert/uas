<?php

/**
 * UserIdentification filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUserIdentificationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'identification' => new sfWidgetFormFilterInput(),
      'user_id'        => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'identification' => new sfValidatorPass(array('required' => false)),
      'user_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'User', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('user_identification_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserIdentification';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'identification' => 'Text',
      'user_id'        => 'ForeignKey',
    );
  }
}
