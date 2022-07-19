<?php

  require_once("model/indexModel.php");

  function showIndex() {
    $rewrite = false;
    if(isset($_SESSION['id'])){
      $indexModel = new indexModel();
      $allClasses = $indexModel->getClasses();
    }
    require("view/indexView.php");
  }

  function showCreateClassroomForm() {
    $rewrite = true;
    if(isset($_SESSION['id'])) {
      require('view/classroom/createclassroomform.php');
    }
  }
