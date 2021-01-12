<?php
namespace App\Controllers;

use League\Plates\Engine;

class FrontController {

  private $templates;

  public function __construct() {
    $this->templates = new Engine('../views');
  }

  public function home() {
    echo $this->templates->render('sections/home');
  }

  public function error404() {
    echo $this->templates->render('sections/404');
  }

  public function otraCarpeta() {
    echo $this->templates->render('sections/otra');
  }

  public function producto($id) {
    echo $this->templates->render('sections/producto', [
      'id' => $id
    ]);
  }
}