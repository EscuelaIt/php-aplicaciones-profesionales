<?php
namespace App\Controllers;

use App\Models\Manual;
use League\Plates\Engine;

class FrontController extends Controller {

  public function home() {
    $manualModel = new Manual;
    $manuals = $manualModel->getAll();
    echo $this->templates->render('sections/home', [
      'manuals' => $manuals,
    ]);
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