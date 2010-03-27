<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/en/user/index')->

  with('request')->begin()->
    isParameter('module', 'user')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;*/

$browser->info('1 - The homepage')->
  get('/')->
  with('request')->begin()->
    isParameter('module', 'user')->
    isParameter('action', 'index')->
  end()->
  with('response')->begin()->
    info(' 1.1 - Expired jobs are not listed')->
    checkElement('.jobs td.position:matches("expired")', false)->
  end()
;

$browser->setHttpHeader('ACCEPT_LANGUAGE', 'ti_ET,ti,en;q=0.7');
$browser->
  info('6 - User culture')->
 
  restart()->
 
  info('  6.1 - For the first request, symfony guesses the best culture')->
  get('/')->
  isRedirected()->followRedirect()->
  with('user')->isCulture('ti')->
 
  info('  6.2 - Available cultures are en and ti')->
  get('/it/')->
  with('response')->isStatusCode(404)
;
 
$browser->setHttpHeader('ACCEPT_LANGUAGE', 'en,ti;q=0.7');
$browser->
  info('  6.3 - The culture guessing is only for the first request')->
 
  get('/')->
  isRedirected()->followRedirect()->
  with('user')->isCulture('ti')
;
