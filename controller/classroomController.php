<?php

  require_once('model/classroomModel.php');

  function showClassroom($id){
    $classModel = new classroomModel();
    if($classModel->isTeacher($id)){
      $getClass = $classModel->getClass($id);
      $class = $getClass->fetch();
      $allStudents = $classModel->getStudents($id);
      $rewrite = true;
      require('view/classroomView.php');
    } else {
      // Si on accède à une classe dont nous sommes pas le prof
    }
  }

  function showStudent($class, $id){
    $classModel = new classroomModel();
    if($classModel->isTeacher($class)){
      $getClass = $classModel->getClass($class);
      $class = $getClass->fetch();
      $getStudent = $classModel->getStudent($id);
      $rewrite = true;
      require('view/classroomView.php');
    } else {
      // Si on accède à une classe dont nous sommes pas le prof
    }
  }
