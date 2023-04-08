<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateConfig
{
  private $translate;

  public function __construct()
  {
    $this->translate = new GoogleTranslate();
    $this->translate->setSource('en');
    $this->translate->setTarget('pt');
  }

  public function translate($text)
  {
    return $this->translate->translate($text);
  }
}
