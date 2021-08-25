<?php $title = "ClassRewards - Ma Classe";
  ob_start();?>
  <?php include('inc/nav.php'); ?>
<?php $content_col = ob_get_clean();
ob_start();?>
  <div>
    <h2><?= htmlspecialchars($class['name']) ?></h2>
  </div>
  <div class="container mt-20">
    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Travail</th>
        <th>Comportement</th>
        <th>Total</th>
        <th>Réserve</th>
      </tr>
      <?php
      while($student = $allStudents->fetch()){
        echo'
        <tr>
          <td>'.htmlspecialchars($student['name']).'</td>
          <td>'.htmlspecialchars($student['surname']).'</td>
          <td></td>
          <td></td>
          <td>'.$student['points'].'</td>
          <td>'.$student['saving'].'</td>
        </tr>';
      }
      ?>
    </table>
  </div>
<?php $content = ob_get_clean();
  require('template_online.php');
?>
