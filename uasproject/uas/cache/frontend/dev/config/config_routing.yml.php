<?php
// auto-generated by sfRoutingConfigHandler
// date: 2009/03/10 15:56:38
return array(
'homepage' => new sfRoute('/', array (
  'module' => 'default',
  'action' => 'index',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);
