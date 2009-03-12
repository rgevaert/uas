<?php

/**
 * EmailAlias form base class.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseEmailAliasForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'local_part'    => new sfWidgetFormInput(),
      'domainname_id' => new sfWidgetFormPropelChoice(array('model' => 'Domainname', 'add_empty' => false)),
      'destination'   => new sfWidgetFormInput(),
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
