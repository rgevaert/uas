<?php

class PHPCaptchaSmallTheme extends PHPCaptchaTheme {

  protected function configure($options = array())
  {

    $this->setOption('fonts', array(
      dirname(__FILE__).'/../fonts/arial.ttf',
      dirname(__FILE__).'/../fonts/Alanden_.ttf',
      dirname(__FILE__).'/../fonts/wyvy.ttf',
    ));
    
    $this->setOption("min_font_size",12);
    $this->setOption("max_font_size",12);
    $this->setOption("width",100);
    $this->setOption("height",30);
    $this->setOption("use_color",false);
    
    $this->setOption("background_images",array(
      dirname(__FILE__).'/../images/white.jpg',
    ));
    
  }

}