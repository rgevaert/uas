<?php

/**
 * PHP Captcha Routing
 *
 * @package    sfPHPCaptchaPlugin
 * @subpackage form
 * @author     Sven Wappler <info@wapplersystems.de>
 */
class sfPHPCaptchaRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();


    $r->prependRoute('phpcaptcha_image', new sfRoute('/phpcaptcha/image', array('module' => 'sfPHPCaptchaPlugin', 'action' => 'image')));
    
    $r->prependRoute('phpcaptcha_audio', new sfRoute('/phpcaptcha/audio', array('module' => 'sfPHPCaptchaPlugin', 'action' => 'audio')));
  }
}
