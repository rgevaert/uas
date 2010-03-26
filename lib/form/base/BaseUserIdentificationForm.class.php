<?php

/**
 * UserIdentification form base class.
 *
 * @method UserIdentification getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUserIdentificationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'identification' => new sfWidgetFormInputText(),
      'user_id'        => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'UserIdentification', 'column' => 'id', 'required' => false)),
      'identification' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'        => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('user_identification[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserIdentification';
  }


}
