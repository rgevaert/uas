<?php
// test/unit/uasTest.php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
 
$t = new lime_test(1, new lime_output_color());
$t->pass('This test always passes.');
?>
