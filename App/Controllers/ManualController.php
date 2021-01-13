<?php
namespace App\Controllers;

use App\Models\Manual;
use League\Plates\Engine;

class ManualController extends Controller {

  public function single($slug) {
    $manualModel = new Manual;
    $manual = $manualModel->get($slug);
    if(is_null($manual)) {
      open404Error();
      exit;
    } 
    echo $this->templates->render('sections/manual_single', [
      'manual' => $manual
    ]);
  }

  public function search() {
    $query = $_POST["query"] ?? '';
    $query = trim($query);
    $query = filter_var($query, FILTER_SANITIZE_STRING);
    $manualModel = new Manual;
    $manuals = $manualModel->search($query); 
    echo $this->templates->render('sections/manual_search', [
      'manuals' => $manuals,
      'query' => $query,
    ]);
  }

  public function edit($slug) {
    $manualModel = new Manual;
    $manual = $manualModel->get($slug);
    if(is_null($manual)) {
      open404Error();
      exit;
    } 
    $errors = [];
    $data = [];
    if($_POST) {
      $data['title'] = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
      $data['order'] = filter_var(trim($_POST['order']), FILTER_SANITIZE_NUMBER_INT);
      if(strlen($data['title']) < 10 || strlen($data['title'] > 100)) {
        $errors[] = 'El título debe contener entre 10 y 100 caracteres';
      }
      if(! filter_var($data['order'], FILTER_VALIDATE_INT)) {
        $errors[] = 'El orden debe de ser un número entero';
      }
      if(count($errors) === 0) {
        $result = $manualModel->update($manual, $data);
        if($result) {
          $manual = $result;
          $msg = 'Editado correctamente';
        } else {
          $errors[] = 'Se ha producido un error al guardar. Inténtalo de nuevo más tarde';
          var_dump($result);
        }
      }
    }
    echo $this->templates->render('sections/manual_edit', [
      'manual' => $manual,
      'errors' => $errors,
      'data' => $data,
      'msg' => $msg ?? ''
    ]);
  }


}