<?php

require_once("model/configModel.php");

class indexModel extends configModel{

  public function getClasses(){
    $db = $this->connect();
    $req = $db->prepare("SELECT * FROM classes WHERE teacher_id = :id");
    $req->execute(array(
      'id' => $_SESSION['id']
    ));
    return $req;
  }

  public function getNbStudents($class){
    $db = $this->connect();
    $req = $db->prepare("SELECT * FROM students WHERE class_id = :id");
    $req->execute(array(
      'id' => $class
    ));
    return $req->rowCount();
  }

}
