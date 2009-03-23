<?php

class PHPCaptchaColorfulTheme extends PHPCaptchaTheme {

  protected function configure($options = array())
  {

    $this->setOption('fonts', array(
      dirname(__FILE__).'/../fonts/arial.ttf',
      dirname(__FILE__).'/../fonts/Alanden_.ttf',
      dirname(__FILE__).'/../fonts/wyvy.ttf',
    ));
    
    $this->setOption("min_font_size",12);
    $this->setOption("max_font_size",16);
    $this->setOption("width",200);
    $this->setOption("height",50);
    $this->setOption("use_color",true);
    
    
    
  }

}