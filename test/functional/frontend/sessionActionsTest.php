<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->info('1.1 - The login page: session Module')->                                      
  get('/')->
  info(' 2.1 - The login page has a clickable sign up link')->
  click('sign up', array(), array('position' => 1))->
  with('request')->begin()->
    isParameter('module', 'register')->
    isParameter('action', 'new')->
  end()
;


