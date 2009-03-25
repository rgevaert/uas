<?php

require_once dirname(__FILE__).'/../lib/samba_accountGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/samba_accountGeneratorHelper.class.php';

/**
 * samba_account actions.
 *
 * @package    uas
 * @subpackage samba_account
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class samba_accountActions extends autoSamba_accountActions
{
    public function executeListLsmbPassword(sfWebRequest $request)
    {
       $this->samba_account_list = SambaAccountPeer::doSelect(new Criteria()); 
    }
}
