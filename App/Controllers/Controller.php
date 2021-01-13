<?php

namespace App\Controllers;

use League\Plates\Engine;

class Controller {
  protected $templates;

  public function __construct() {
    $this->templates = new Engine('../views');
  }
}