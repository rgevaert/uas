<?php


//require_once '/home/vlir/symfony/uas/uasproject/uas/lib/university/symfony/lib/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
//    sfYaml::setSpecVersion('1.1');
    // for compatibility / remove and enable only the plugins you want
    $this->enableAllPluginsExcept(array('sfPropelPlugin'));
  }
}
