<?php

/**
 * BackendUser form.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class BackendUserForm extends UserForm
{
  public function configure_specific()
  {
    parent::configure_specific();
    unset(
        $this['created_at'], $this['updated_at'],
        $this['login'], 
        $this['nt_password'], $this['lm_password'], $this['crypt_password'], $this['unix_password'],
        $this['email_local_part'],
        $this['gid'], $this['uid'],
		$this['domainname_id']
        ); 
  }
}
