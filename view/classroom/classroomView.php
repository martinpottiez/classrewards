<?php $title = "JollyClass - Ma Classe";
  ob_start();?>
  <?php $nav = '<a href="classroom/'.$_GET['id'].'"><li class="subtitleIcon mediumFont color-white p10 br-25"><i class="fas fa-school"></i></i><span>'.htmlspecialchars($class['name']).'</span></li></a>';
  include('view/inc/nav.php'); ?>
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
    <h2><i class="fas fa-school color-primary mr-20"></i> <?= htmlspecialchars($class['name']) ?></h2>
  </div>
  <div class="container fd-column mt-20">
    <div class="container gap20">
      <div class="fg-1 bg-white br-25 p20 center">
        <p class="semiBold megaFont mb-10 mt-10"><?= $class['points'] ?></p>
        <p class="semiBold mediumSpacing extraFont mt-10">points</p>
      </div>
      <div class="fg-1 bg-white br-25 p20">
      </div>
    </div>
    <div class="container mt-20 gap20">
      <div class="bg-lightPrimary br-25 p20 fg-2">
        <a href="classroom/<?=$_GET['id']?>/addstudent">
          <div class="container subtitleIcon color-white alignItemsCenter gap20 p20 br-25 lightCard">
            <i class="fas fa-plus-circle extraFont"></i>
            <span class="mediumFont">Ajouter un élève</span>
          </div>
        </a>
        <a href="classroom/<?=$_GET['id']?>/settings">
        <div class="container subtitleIcon color-white alignItemsCenter mt-20 gap20 p20 br-25 lightCard">
          <i class="fas fa-cog extraFont"></i>
          <span class="mediumFont">Paramètres de la classe</span>
        </div>
        </a>
      </div>
      <div class="bg-white br-25 fg-3">
        <table>
          <tr>
            <th>Élève</th>
            <th>Points</th>
            <th>Bonus</th>
            <th></th>
          </tr>
          <?php
          while($student = $allStudents->fetch()){
            echo'
            <tr>
              <td class="left"><a class="pl-20" href="classroom/'.$_GET['id'].'/'.$student['id'].'"><i class="fas fa-user-circle colorLight"></i><span class="pl-20">'.htmlspecialchars($student['name']).' '.substr(htmlspecialchars($student['surname']), 0, 1).'.</span></a></td>
              <td><a href="classroom/'.$_GET['id'].'/'.$student['id'].'">'.$student['points'].'</a></td>
              <td><a href="classroom/'.$_GET['id'].'/'.$student['id'].'">'.$student['saving'].'</a></td>
              <td><a href="classroom/'.$_GET['id'].'/'.$student['id'].'"><i class="far fa-arrow-right colorLight"></i></a></td>
            </tr>';
          }
          if($allStudents->rowCount() == 0) {
            echo'<tr><td colspan="4">Aucun élève dans la classe</td></tr>';
          }
          ?>
        </table>
      </div>
    </div>
  </div>
<?php }
$content = ob_get_clean();
  require('view/template_online.php');
?>
