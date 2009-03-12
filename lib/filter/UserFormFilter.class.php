<?php

/**
 * User filter form.
 *
 * @package    uas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class UserFormFilter extends BaseUserFormFilter
{

  public function configure()
  {
	$this->setWidget('status', new sfWidgetFormChoice(array(
		'choices' => UserPeer::$status_types
		))
	);

	$this->setValidator('status', new sfValidatorChoice(array(
		'required' => false, 
		'choices' => array_keys(UserPeer::$status_types)
		))
	);
  }

	public function getFields()
	{
		return array_merge(parent::getFields(), array(
			'status' => 'ForeignKey'
			));
	}
}
