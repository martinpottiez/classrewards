<?php
  session_start();

  require('controller/classroomController.php');

  if(isset($_SESSION['id'])){
    if(isset($_GET['id'])){
      try {
        if(isset($_GET['student'])){
          showStudent($_GET['id'], $_GET['student']);
        } else {
          showClassroom($_GET['id']);
        }
      }
      catch(Exception $e){
        $error = $e->getMessage();
        echo $error;
      }
    }
  } else {
    header('Location: ../index.php');
  }
