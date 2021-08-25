<?php
  session_start();

  require('controller/classroomController.php');

  if(isset($_SESSION['id'])){
    if(isset($_GET['id'])){
      try {
          showClassroom($_GET['id']);
      }
      catch(Exception $e){
        $error = $e->getMessage();
        echo $error;
      }
    }
  } else {
    header('Location: ../index.php');
  }
