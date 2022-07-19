<?php $title = "JollyClass";
ob_start();
$nav = '<a href="classroom/'.$_GET['id'].'"><li class="subtitleIcon mediumFont color-white p10 br-25"><i class="fas fa-school"></i></i><span>'.htmlspecialchars($class['name']).'</span></li></a>';?>
<?php include('view/inc/nav.php');?>
<?php $content_col = ob_get_clean(); ?>
<div>
  <h2>Ajouter un élève</h2>
</div>
<div class="mt-20">
  <form method="post" action="classroom/<?= $_GET['id'] ?>/didaddstudent">
    <input type="text" name="name" placeholder="Prénom"/>
    <input type="text" name="surname" placeholder="Nom"/>
    <input type="submit" class="bg-lightPrimary" name="addStudent" value="Ajouter"/>
  </form>
</div>
<?php $content = ob_get_clean();
require('view/template_online.php'); ?>
