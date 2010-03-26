<?php

/**
 * EmailAlias form base class.
 *
 * @method EmailAlias getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEmailAliasForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'local_part'    => new sfWidgetFormInputText(),
      'domainname_id' => new sfWidgetFormPropelChoice(array('model' => 'Domainname', 'add_empty' => false)),
      'destination'   => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'EmailAlias', 'column' => 'id', 'required' => false)),
      'local_part'    => new sfValidatorString(array('max_length' => 255)),
      'domainname_id' => new sfValidatorPropelChoice(array('model' => 'Domainname', 'column' => 'id')),
      'destination'   => new sfValidatorString(array('max_length' => 255)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'EmailAlias', 'column' => array('local_part', 'domainname_id', 'destination')))
    );

    $this->widgetSchema->setNameFormat('email_alias[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailAlias';
  }


}
