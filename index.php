<?php
  session_start();
  require("controller/indexController.php");
  require("controller/loginController.php");

  try{
    if(isset($_GET["action"])){
      switch($_GET["action"]){
        case "login":
          login();
        break;
        default:
          showIndex();
      }
    }
    else {
      showIndex();
    }
  }
  catch(Exception $e){
    $error = $e->getMessage();
    if(isset($_GET['action'])){$rewrite = true;}
    require('view/indexView.php');
  }
