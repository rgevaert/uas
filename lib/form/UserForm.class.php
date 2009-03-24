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
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
        'choices' => UserPeer::$status_types,
        'expanded' => true,
    ));
    $this->validatorSchema['status'] = new sfValidatorChoice(array(
        'choices' => array_keys(UserPeer::$status_types),
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
        'choices' => UserPeer::$gid_types,
        'multiple' => false,
    ));	   

	$this->validatorSchema['alternate_email'] = new sfValidatorEmail();
        $this->widgetSchema->setHelp('email_local_part','This will be your email local part');

        // create a new subcategory form for a new subcategory model object
        $ftp_form = new FtpAccountForm();

        // Unset some values
        unset($ftp_form['created_at']);
        unset($ftp_form['updated_at']);
        //unset($ftp_form['user_id']);

        // embed the subcategory form in the main category form
        $this->embedForm('ftpaccount', $ftp_form);

          // set a custom label for the embedded form
        $this->widgetSchema['ftpaccount']->setLabel('New Ftp account');
        //parent::bind($taintedValues, $taintedFiles);
        //}

  }
  
  public function configure()
  {
    parent::configure();
    $this->configure_specific();
  }
}
