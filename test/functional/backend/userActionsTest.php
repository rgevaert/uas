<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

/*$browser->
  get('/user/index')->

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
    checkElement('.jobs td.position:contains("expired")', false)->
  end()
;

$browser->info('2 - The job page')->                                      
  get('/')->
  info(' 2.1 - Each user on the homepage has a clickable edit link')->
  click('Edit', array(), array('position' => 1))->
  with('request')->begin()->
    isParameter('module', 'user')->
    isParameter('action', 'edit')->
 /*   isParameter('company_slug', 'sensio-labs')->
    isParameter('location_slug', 'paris-france')->
    isParameter('position_slug', 'web-developer')->
    isParameter('id', $browser->getMostRecentProgrammingJob()->getId())-> */
  end()
;


