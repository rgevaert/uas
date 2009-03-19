<?php
// test/unit/uasTest.php
require_once(dirname(__FILE__) . '/../bootstrap/propel.php');

$t = new lime_test(3, new lime_output_color());


$get_user = create_user();
$t->is($get_user->getLogin(), "abebe");


$get_user = create_user();
$t->is($get_user->getLogin(), "abebekebede");

$get_user = create_user();
$t->is($get_user->getLogin(), "abebe1");

function create_user()
{
       $user = new User();
       $user->setName("abebe");
       $user->setFathersName("kebede");
       $user->setGrandFathersName("welede");
       $user->setEmailQuota("500000S");
       $user->setGid("2000");
       $user->setExpiresAt("2010-08-08");
       $user->setStatus("Disactivated");
       $user->setEmailLocalPart("abebe.kebede".rand(1,1000));        
       $user->save();
       
       return $user;
}

?>
