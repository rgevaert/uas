<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/register/index')->

  with('request')->begin()->
    isParameter('module', 'register')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;

$browser = new sfTestFunctional(new sfBrowser());

$browser->info('1.1 - The login page: session Module')->                                      
  get('/')->
  info(' 2.1 - The login page has a clickable sign up link')->
  click('Reset')->
  with('request')->begin()->
    isParameter('module', 'register')->
    isParameter('action', 'index')->
  end()
;
