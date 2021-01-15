<?php
namespace App\Models;

class Manual {

  private $connection;

  public function __construct() {
    $this->connection = Connection::getInstance()->getConnection();
  }

  public function getAll() {
    $ssql = "select * from manuals";
    $result = $this->connection->query($ssql);
    return $result->fetchAll();
  }

  public function get($slug) {
    $ssql = "SELECT * FROM manuals WHERE slug=:slug";
    $prepared = $this->connection->prepare($ssql);
    $prepared->execute([
      'slug' => $slug,
    ]);
    $result = $prepared->fetchAll();
    if(count($result) === 0) {
      return null;
    }
    return $result[0];
  }

  public function find($id) {
    $ssql = "SELECT * FROM manuals WHERE id=:id";
    $prepared = $this->connection->prepare($ssql);
    $prepared->execute([
      'id' => $id,
    ]);
    $result = $prepared->fetchAll();
    if(count($result) === 0) {
      return null;
    }
    return $result[0];
  }

  public function search($query) {
    $ssql = "SELECT * FROM manuals WHERE title like :title or excerpt like :excerpt";
    $prepared = $this->connection->prepare($ssql);
    $prepared->execute([
      'title' => "%$query%",
      'excerpt' => "%$query%",
    ]);
    return $prepared->fetchAll();
  }

  public function update($manual, $data) {
    $ssql = "UPDATE manuals SET title=:title, manuals.order=:order WHERE id=:id";
    $prepared = $this->connection->prepare($ssql);
    $isOk = $prepared->execute([
      'id' => $manual['id'],
      'title' => $data['title'],
      'order' => $data['order'],
    ]);
    // print_r($prepared->errorInfo());
    // echo '<hr>';
    // $prepared->debugDumpParams();
    if($isOk) {
      return $this->get($manual["slug"]);
    } 
    return false;
  }
  
  public function insert($data) {
    $ssql = "INSERT INTO manuals (manuals.title, manuals.order, manuals.slug) VALUES (:title, :order, :slug)";
    $prepared = $this->connection->prepare($ssql);
    $isOk = $prepared->execute([
      'title' => $data['title'],
      'order' => $data['order'],
      'slug' => $this->generateRandomString(),
    ]);
    if($isOk) {
      return $this->connection->lastInsertId();
    } 
    // echo $prepared->debugDumpParams();
    // echo '<hr>';
    // var_dump($prepared->errorInfo());
    return false;
  }

  private function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
}