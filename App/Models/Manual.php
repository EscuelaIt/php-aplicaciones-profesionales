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
  
}