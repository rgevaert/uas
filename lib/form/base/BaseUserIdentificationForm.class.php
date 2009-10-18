<?php

/**
 * UserIdentification form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseUserIdentificationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'identification' => new sfWidgetFormInput(),
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
