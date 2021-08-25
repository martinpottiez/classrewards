<?php $title = "ClassRewards";

if(isset($_SESSION['id'])){

  require('template_online.php');
} else {
  
  require('template_offline.php');
}  ?>
