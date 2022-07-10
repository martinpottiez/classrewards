<?php

  require_once("model/loginModel.php");

  function login() {
    if(isset($_POST['login']) AND !isset($_SESSION['id'])) {
      if(isset($_POST['mail']) AND isset($_POST['password'])) {
        if(!empty($_POST['mail']) AND !(empty($_POST['password']))) {
          $mail = $_POST['mail'];
          $pass = $_POST['password'];

          if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $loginModel = new loginModel();
            if($loginModel->is_login($mail, $pass)) {
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
        throw new Exception('Recharger votre page');
      }
    } else {
      header('Location: ../index2');
    }
  }

  function logout() {
    if(isset($_SESSION['id'])){
      session_destroy();
      header("Location: ../index");
    }
  }

  function register() {
    if(isset($_POST['register'])) {
      if(isset($_POST['surname']) AND isset($_POST['name']) AND isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['cpassword'])) {
        if(!empty($_POST['surname']) AND !empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['cpassword'])) {
          $mail = $_POST['mail'];
          if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $surname = $_POST['surname'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $confirmation = $_POST['cpassword'];
            if($password == $confirmation) {
              $loginModel = new loginModel();
              $userInfos = array($surname, $name, $mail, $password);
              if($loginModel->register($userInfos)) {
                if($loginModel->is_login($mail, $password)) {
                  header('Location: ../index');
                }
              }
            } else {
              throw new Exception('Mot de passe et confirmation différents');
            }
          } else {
            throw new Exception('Mail invalide');
          }
        } else {
          throw new Exception('Remplir tous les champs');
        }
      } else {
        throw new Exception('Recharger votre page');
      }
    }
  }
