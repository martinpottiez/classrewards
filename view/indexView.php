<?php $title = "JollyClass";

if(isset($_SESSION['id'])){
  ob_start();?>
  <?php include('inc/nav.php');?>
  <?php $content_col = ob_get_clean(); ?>
  <div>
    <h2>Mes classes</h2>
  </div>
    <?php
    if($allClasses->rowCount() == 0) {
      echo'
      <div class="container mt-20 justifyCenter">
        <div class="center bg-white br-25 p20">
          Vous n\'avez pas de classe rattachée à votre compte, créez-en une !
          <a href="index/createClassroom" class="mt-20 bg-lightPrimary link-button">Créer une classe</a>
        </div>';
    } else {
      echo'<div class="container mt-20">';
    }
    while($class = $allClasses->fetch()) {
      echo '
      <div class="card center container fd-column shadow">
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
    if($allClasses->rowCount() > 0) {
      echo'<a href="index/createClassroom" class="addButton p20">+</a>';
    }
    ?>

  </div>
  <div class="mt-20">
    <h2>Classement</h2>
  </div>
  <div class="center bg-white br-25 p20 mt-20">
    Les statistiques ne sont pas encore disponibles.
  </div>
<?php $content = ob_get_clean();
  require('template_online.php');
} else {
  ob_start();?>
  <div class="container fd-column">
    <div class="center mt-20 mb-20">
      <img src="view/img/logoPurple.png" alt="Logo de JollyClass" class="minLogo"/>
    </div>
    <div class="container justify-sb gap20">
      <div class="bg-lightPrimary p20 br-25 fg-1 fbasis0">
        <div class="subtitleIcon color-white largeFont"><i class="fas fa-plus-circle"></i> <span>Inscription<span></div>
        <form method="post" action="index/register">
          <div class="container nowrap gap20">
            <input type="text" name="name" placeholder="Prénom"/>
            <input type="text" name="surname" placeholder="Nom"/>
          </div>
          <input type="email" name="mail" placeholder="Adresse mail"/>
          <input type="password" name="password" placeholder="Mot de passe"/>
          <input type="password" name="cpassword" placeholder="Confirmation"/>
          <input type="submit" name="register" class="bg-primary" value="Inscription"/>
        </form>
      </div>
      <div class="bg-white p20 br-25 fg-1 fbasis0">
        Infos
      </div>
    </div>
  </div>
  <?php $content = ob_get_clean();
  require('template_offline.php');
}  ?>
