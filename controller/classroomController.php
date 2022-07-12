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
      header('Location: ../index');
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
      header('Location: ../index');
    }
  }

  function createClassroom() {
    if(isset($_POST['classeCreation'])) {
      if(isset($_POST['name']) AND !empty($_POST['name'])) {
        $name = $_POST['name'];
        if(strlen($name) >= 2 AND strlen($name) < 26) {
          $classModel = new classroomModel();
          $classModel->createClassroom($name);
          header('Location: ../index');
        } else {
          throw new Exception("Veuillez saisir un nom entre 2 et 25 caractères");
        }
      } else {
        throw new Exception("Veuillez saisir un nom pour votre classe");
      }
    } else {
      header('Location: ../index');
    }
  }

  function showAddStudent() {
    $rewrite = true;
    if(isset($_SESSION['id'])) {
      require('view/createstudentform.php');
    }
  }

  function addStudent() {
    if(isset($_POST['addStudent'])) {
      if(isset($_POST['name']) AND isset($_POST['surname']) AND !empty($_POST['name']) AND !empty($_POST['surname'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $class = $_GET['id'];
        $classModel = new classroomModel();
        $classModel->addStudent($name, $surname, $class);
        header('Location: ../'.$_GET['id'].'');
      } else {
        throw new Exception("Veuillez remplir le nom et prénom de l'élève");
      }
    } else {
      header('Location: ../index');
    }
  }
