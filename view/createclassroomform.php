<?php $title = "JollyClass";
ob_start();?>
<?php include('inc/nav.php');?>
<?php $content_col = ob_get_clean(); ?>
<div>
  <h2>Création d'une classe</h2>
</div>
<div class="mt-20">
  <form method="post" action="classroom/createclassroom">
    <input type="text" name="name" placeholder="Nom de la classe"/>
    <input type="submit" class="bg-lightPrimary" name="classeCreation" value="Créer la classe"/>
  </form>
</div>
<?php $content = ob_get_clean();
require('template_online.php'); ?>
