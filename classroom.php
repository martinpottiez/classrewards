<?php session_start();

  require('controller/classroomController.php');

  if(isset($_SESSION['id'])){
    if(isset($_GET['id'])){
      switch($_GET['id']) {
        case "createclassroom":
          createClassroom();
        break;
        default:
          try {
            if(isset($_GET['student'])){
              switch($_GET['student']) {
                case "addstudent":
                  showAddStudent();
                break;
                case "didaddstudent":
                  addStudent();
                break;
                case "settings":
                  showSettings();
                break;
                case "dideditsettings":
                  update();
                break;
                default:
                  showStudent($_GET['id'], $_GET['student']);
              }
            } else {
              showClassroom($_GET['id']);
            }
          }
          catch(Exception $e){
            $error = $e->getMessage();
            echo $error;
          }
      }
    }
  } else {
    header('Location: ../index.php');
  }
