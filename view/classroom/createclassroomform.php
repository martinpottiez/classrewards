<?php $title = "JollyClass";
ob_start();?>
<?php include('view/inc/nav.php');?>
<?php $content_col = ob_get_clean(); ?>
<div>
  <h2><i class="fas fa-plus-circle color-primary mr-20"></i>Création d'une classe</h2>
</div>
<div class="container p20 bg-white mt-20 br-25 gap20 nowrap">
  <div class="fg-1 fbasis0">
    <form method="post" action="classroom/createclassroom">
      <input type="text" class="borderLight" name="name" placeholder="Nom de la classe"/>
      <input type="submit" class="bg-lightPrimary" name="classeCreation" value="Créer la classe"/>
    </form>
  </div>
  <div class="fg-1 fbasis0">
    <div class="subtitleIcon colorLight">
      <i class="fas fa-info-circle"></i>
      Informations
    </div>
    <p>
      Créez une classe en renseignant uniquement le nom de cette dernière. Vous pourrez par la suite accéder à tous les paramètres afin de la configurer selon vos besoins.
    </p>
  </div>
</div>
<?php $content = ob_get_clean();
require('view/template_online.php'); ?>
