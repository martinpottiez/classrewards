<?php

  require_once("model/loginModel.php");

  function login(){
    if(isset($_POST['login'])){
      if(isset($_POST['mail']) AND isset($_POST['password'])){
        if(!empty($_POST['mail']) AND !(empty($_POST['password']))){
          $mail = $_POST['mail'];
          $pass = $_POST['password'];

          if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $loginModel = new loginModel();
            if($loginModel->is_login($mail, $pass)){
              header('Location: ../index');
            } else {
              throw new Exception('test');
            }
          } else {
            throw new Exception('Mauvais mail');
          }
        } else {
          throw new Exception('Remplir tous les champs');
        }
      } else {
        throw new Exception('Variable inexistante');
      }
    }
    $rewrite = true;
    require("view/indexView.php");
  }

  function logout(){
    if(isset($_SESSION['id'])){
      session_destroy();
      header("Location: ../index");
    }
  }
