<?php

/**
 * User form.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class UserForm extends BaseUserForm
{
  public function configure_specific()
  {
    $this->validatorSchema['name'] = new sfValidatorRegex(array(
        'pattern'=>'/^[a-zA-Z\s]{2,}$/'), array(
        'invalid' => 'Name is invalid, Enter Any character in the range a-z or A-Z, spaces and minimum two characters'
    ));
    $this->validatorSchema['fathers_name'] = new sfValidatorRegex(array(
        'pattern'=>'/^[a-zA-Z\s]{2,}$/'), array(
        'invalid' => 'Father name is invalid, Enter Any character in the range a-z or A-Z, spaces and minimum two characters'
    ));
    $this->validatorSchema['grand_fathers_name'] = new sfValidatorRegex(array
	      ('pattern'=>'/^[a-zA-Z\s]{2,}$/', 'required' => false), array('invalid' => 'Grand Father name is invalid, Enter Any character in the range a-z or A-Z, spaces and minimum two characters'
    ));
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
        'choices' => UserTable::$status_types,
        'expanded' => true,
    ));
    $this->validatorSchema['status'] = new sfValidatorChoice(array(
        'choices' => array_keys(UserTable::$status_types),
    ));

    $this->validatorSchema['gid'] = new sfValidatorInteger(array(
		'min' => 2000,
		'max' => 10000,
	));
	$this->validatorSchema['uid'] = new sfValidatorInteger(array(
		'min' => 2000,
		'max' => 100000,
		'required' => false,
		));

	$this->validatorSchema['email_quota'] = new sfValidatorRegex(array
	     ('pattern'=>'/^[\d]+[SC]$/'));
	
	$this->widgetSchema['gid'] = new sfWidgetFormChoice(array(
        'choices' => UserTable::$gid_types,
        'multiple' => false,
    ));	   

	$this->validatorSchema['alternate_email'] = new sfValidatorEmail(
        array('required' => false));
    
   $this->validatorSchema['phone'] = new sfValidatorRegex(array
	     ('pattern'=>'/\+[0-9]{6,}/',
           'required' => false));

    $this->widgetSchema->setHelp('email_local_part','This will be your email local part');

	if($this->isNew()){
		$this->getObject()->setExpiresAt(time() + 3 * 30 * 86400);
	}

  }
  
  public function configure()
  {
    parent::configure();
    $this->configure_specific();
  }
}
