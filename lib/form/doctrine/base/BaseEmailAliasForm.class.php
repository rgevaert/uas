<?php

/**
 * EmailAlias form base class.
 *
 * @method EmailAlias getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseEmailAliasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'local_part'    => new sfWidgetFormInputText(),
      'domainname_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DomainName'), 'add_empty' => false)),
      'destination'   => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'local_part'    => new sfValidatorString(array('max_length' => 255)),
      'domainname_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DomainName'))),
      'destination'   => new sfValidatorString(array('max_length' => 255)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'EmailAlias', 'column' => array('local_part'))),
        new sfValidatorDoctrineUnique(array('model' => 'EmailAlias', 'column' => array('local_part', 'domainname_id', 'destination'))),
      ))
    );

    $this->widgetSchema->setNameFormat('email_alias[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailAlias';
  }

}
