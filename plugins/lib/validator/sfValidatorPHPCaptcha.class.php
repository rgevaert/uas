<?php

/**
 * PHP Captcha Form Validator
 *
 * @package    sfPHPCaptchaPlugin
 * @subpackage form
 * @author     Sven Wappler <info@wapplersystems.de>
 */
class sfValidatorPHPCaptcha extends sfValidatorBase {


  protected function configure($options = array(), $messages = array()) {
    parent::configure($options, $messages);
  }

  protected function doClean($value) {

    $clean = (string)$value;

    if (!PhpCaptcha::Validate($clean)) {
      throw new sfValidatorError($this, 'invalid', array('value' => $value));
    }

    return $clean;
  }

}

