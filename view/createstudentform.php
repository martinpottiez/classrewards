<?php $title = "JollyClass";
ob_start();?>
<?php include('inc/nav.php');?>
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
require('template_online.php'); ?>
