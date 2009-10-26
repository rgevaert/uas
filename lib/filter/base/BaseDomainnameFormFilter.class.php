<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Domainname filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseDomainnameFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('domainname_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Domainname';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'name' => 'Text',
    );
  }
}
