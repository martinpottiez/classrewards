<?php

  function login(){
    if(isset($_POST['login'])){
      if(isset($_POST['mail']) AND isset($_POST['password'])){
        if(!empty($_POST['mail']) AND !(empty($_POST['password']))){
          $mail = $_POST['mail'];
          $pass = $_POST['password'];
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
