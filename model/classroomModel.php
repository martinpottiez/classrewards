<?php

require_once('model/configModel.php');

class classroomModel extends configModel {

  public function getClass($id){
    $db = $this->connect();
    $req = $db->prepare("SELECT * FROM classes WHERE id = :id");
    $req->execute(array(
      'id' => $id
    ));
    return $req;
  }

  public function isTeacher($id){
    $bool = false;
    $db = $this->connect();
    $getClass = $this->getClass($id);
    if($this->returnNumber($getClass) == 1){
      $class = $getClass->fetch();
      if($_SESSION['id'] == $class['teacher_id']){
        $bool = true;
      }
    } else {
      throw new Exception("Classe inexistante");
    }
    return $bool;
  }

  public function getStudents($id){
    $db = $this->connect();
    $req = $db->prepare("SELECT * FROM students WHERE class_id = :id");
    $req->execute(array(
      'id' => $id
    ));
    return $req;
  }

  public function getStudent($id){
    $db = $this->connect();
    $req = $db->prepare("SELECT * FROM students WHERE id = :id");
    $req->execute(array(
      'id' => $id
    ));
    return $req;
  }

  public function createClassroom($name) {
    $db = $this->connect();
    $req = $db->prepare("INSERT INTO classes (teacher_id, name) VALUES (:teacher_id, :name)");
    $req->execute(array(
      'teacher_id' => $_SESSION['id'],
      'name' => $name
    ));
  }

  public function addStudent($name, $surname, $class) {
    $db = $this->connect();
    $req = $db->prepare("INSERT INTO students (class_id, surname, name) VALUES (:class_id, :surname, :name)");
    $req->execute(array(
      'class_id' => $class,
      'surname' => $surname,
      'name' => $name
    ));
  }
}
