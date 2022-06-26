<?php $title = "ClassRewards - Ma Classe";
  ob_start();?>
  <?php $nav = '
  <li class="color-white p10"><i class="fas fa-school"></i> <b>'.htmlspecialchars($class['name']).'</b></li>
  <li class="bg-lightPrimary pl-15"><a href="classroom/'.$_GET['id'].'">Élèves</a></li>';
  include('inc/nav.php'); ?>
<?php $content_col = ob_get_clean();
ob_start();
if(isset($_GET['student'])){
  $student = $getStudent->fetch();?>
  <div class="container bg-primary p10 border-r8 shadow">
    <div class="mr-20">
      <i class="fas fa-user-circle student-icon"></i>
    </div>
    <div>
      <h2 class="color-white">
        <?= htmlspecialchars(strtoupper($student['name'])); ?> <br />
        <?= htmlspecialchars($student['surname']); ?></h2>
    </div>
  </div>
  <div class="container mt-20">
    <div class="container fd-column mr-5 fg-1">
      <div class="container fd-column bg-white br-8 shadow">
        <div class="border-br p10 center">
          <p class="title color-primary"><?= $student['points'];?></p>
          <p class="smallTitle color-primary">points</p>
        </div>
        <div class="container center mt-20 p10">
          <div class="container fd-column fg-1">
            <div class="circle bg-primary">
              5
            </div>
            <div class="subtitle mt-20">
              Travail
            </div>
          </div>
          <div class="container fd-column fg-1">
            <div class="circle bg-primary">
              5
            </div>
            <div class="subtitle mt-20">
              Comportement
            </div>
          </div>
          <div class="container fd-column fg-1">
            <div class="circle bg-primary">
              <?= $student['saving']; ?>
            </div>
            <div class="subtitle mt-20">
              Réserve
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow mt-20">
        HISTORIQUE
      </div>
    </div>
    <div class="container fd-column ml-5 fg-1">
      <div class="card shadow">
        AJOUT POINTS
      </div>
      <div class="card shadow mt-20">
        STATISTIQUES
      </div>
      <div class="card shadow mt-20">
        RÉCOMPENSES
      </div>
    </div>
  </div>
  <?php
} else {?>
  <div>
    <h2><?= htmlspecialchars($class['name']) ?></h2>
  </div>
  <div class="container fd-column mt-20">
    <div class="container">
      <div class="bg-white border-br shadow mr-20 color-primary p10">
        <a href=""><i class="fas fa-user-plus"></i> Ajouter un élève</a>
      </div>
    </div>
    <table class="shadow mt-20">
      <tr>
        <th>Nom</th>
        <th>Travail</th>
        <th>Comportement</th>
        <th>Total</th>
        <th>Réserve</th>
      </tr>
      <?php
      while($student = $allStudents->fetch()){
        echo'
        <tr>
          <td><a href="classroom/'.$_GET['id'].'/'.$student['id'].'">'.htmlspecialchars($student['name']).' '.htmlspecialchars($student['surname']).'</a></td>
          <td><a href="classroom/'.$_GET['id'].'/'.$student['id'].'"></a></td>
          <td><a href="classroom/'.$_GET['id'].'/'.$student['id'].'"></a></td>
          <td><a href="classroom/'.$_GET['id'].'/'.$student['id'].'">'.$student['points'].'</a></td>
          <td><a href="classroom/'.$_GET['id'].'/'.$student['id'].'">'.$student['saving'].'</a></td>
        </tr>';
      }
      ?>
    </table>
  </div>
<?php }
$content = ob_get_clean();
  require('template_online.php');
?>
