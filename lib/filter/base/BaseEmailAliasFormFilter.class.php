<?php

/**
 * EmailAlias filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseEmailAliasFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'local_part'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'domainname_id' => new sfWidgetFormPropelChoice(array('model' => 'Domainname', 'add_empty' => true)),
      'destination'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'local_part'    => new sfValidatorPass(array('required' => false)),
      'domainname_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Domainname', 'column' => 'id')),
      'destination'   => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('email_alias_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailAlias';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'local_part'    => 'Text',
      'domainname_id' => 'ForeignKey',
      'destination'   => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
