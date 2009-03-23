<?php

abstract class PHPCaptchaTheme {

  protected $options = array();


  /**
   * Constructor.
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   */
  public function __construct($options = array())
  {
    
    $this->addOption("fonts",array());
    $this->addOption("num_chars",5);
    $this->addOption("num_lines",70);
    $this->addOption("width",200);
    $this->addOption("height",50);
    $this->addOption("shadow",false);
    $this->addOption("char_set",'');
    $this->addOption("case_insensitive",true);
    $this->addOption("background_images",null);
    $this->addOption("min_font_size",16);
    $this->addOption("max_font_size",25);
    $this->addOption("use_color",true);
    
    $this->configure($options);
    

    // check option names
    if ($diff = array_diff(array_keys($options), array_keys($this->options)))
    {
      throw new InvalidArgumentException(sprintf('%s does not support the following options: \'%s\'.', get_class($this), implode('\', \'', $diff)));
    }

    $this->options = array_merge($this->options, $options);
  }

  /**
   * Configures the current widget.
   *
   * This method allows each widget to add options or HTML attributes
   * during widget creation.
   *
   * If some options and HTML attributes are given in the sfWidget constructor
   * they will take precedence over the options and HTML attributes you configure
   * in this method.
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of HTML attributes
   *
   * @see __construct()
   */
  protected function configure($options = array())
  {
  }

  /**
   * Adds a new option value with a default value.
   *
   * @param string $name   The option name
   * @param mixed  $value  The default value
   */
  public function addOption($name, $value = null)
  {
    $this->options[$name] = $value;
  }

  /**
   * Changes an option value.
   *
   * @param string $name   The option name
   * @param mixed  $value  The value
   */
  public function setOption($name, $value)
  {
    if (!in_array($name, array_keys($this->options)))
    {
      throw new InvalidArgumentException(sprintf('%s does not support the following option: \'%s\'.', get_class($this), $name));
    }

    $this->options[$name] = $value;
  }

  /**
   * Gets an option value.
   *
   * @param  string The option name
   *
   * @return mixed  The option value
   */
  public function getOption($name)
  {
    return isset($this->options[$name]) ? $this->options[$name] : null;
  }

  /**
   * Returns true if the option exists.
   *
   * @param  string $name  The option name
   *
   * @return bool true if the option exists, false otherwise
   */
  public function hasOption($name)
  {
    return array_key_exists($name, $this->options);
  }


}