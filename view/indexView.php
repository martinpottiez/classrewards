<?php $title = "ClassRewards";

if(isset($_SESSION['id'])){
  ob_start();?>
  <div>
    <h2>Mes classes</h2>
  </div>
  <div class="container mt-20">
    <?php
    while($class = $allClasses->fetch()){
      echo '
      <div class="card center container fd-column">
        <div>
          <h4>'.htmlspecialchars($class['name']).'</h4>
        </div>
        <div>
          '.$indexModel->getNbStudents($class['id']).' élèves
        </div>
        <div class="mt-20">
          <a href="classroom/'.$class['id'].'" class="link-bold">Gérer</a>
        </div>
      </div>';
    }
    ?>
  </div>
<?php $content = ob_get_clean();
  require('template_online.php');
} else {

  require('template_offline.php');
}  ?>
