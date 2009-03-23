<?php

class sfPHPCaptchaPluginActions extends sfActions
{
  public function executeImage()
  {

    $theme = sfConfig::get("app_phpcaptcha_theme","Small");
    if (class_exists("PHPCaptcha".$theme."Theme")) {
      eval("\$theme = new PHPCaptcha".$theme."Theme();");
    } else $theme = new PHPCaptchaSmallTheme();
    

    
    $oVisualCaptcha = new PhpCaptcha($theme);
    
    $oVisualCaptcha->setOwnerText(sfConfig::get("app_phpcaptcha_ownertext",""));
    
    $oVisualCaptcha->setHeight(sfConfig::get("app_phpcaptcha_height",$theme->getOption('height')));
    $oVisualCaptcha->setWidth(sfConfig::get("app_phpcaptcha_width",$theme->getOption('width')));
    
    $oVisualCaptcha->Create();

    return sfView::NONE;
  }

  public function executeAudio()
  {

    $oAudioCaptcha = new AudioPhpCaptcha(sfConfig::get("app_phpcaptcha_flitepath","/usr/bin/flite"), '/tmp/');
    $oAudioCaptcha->Create();

    return sfView::NONE;
  }
}

