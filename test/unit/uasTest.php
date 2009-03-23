<?php
// test/unit/uasTest.php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
require_once dirname(__FILE__).'/../../lib/Password.class.php';
$t = new lime_test(5, new lime_output_color());

$pass = new Password();
$p = $pass->getPassword();

$t->is(strlen($p), 8);
preg_match_all('/[A-Z]/', $p, $cap_letter_match);
preg_match_all('/[a-z]/', $p, $small_letter_match);
preg_match_all('/[0-9]/', $p, $number_match);
preg_match_all('/[&\$@#\)\(\[\]\?><!]/', $p, $special_char_match);
$t->is(count($cap_letter_match[0]), 2);
$t->is(count($small_letter_match[0]), 2);
$t->is(count($number_match[0]), 2);
$t->is(count($special_char_match[0]), 2);
?>
