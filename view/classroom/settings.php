<?php $title = "JollyClass";
ob_start();
$nav = '<a href="classroom/'.$_GET['id'].'"><li class="subtitleIcon mediumFont color-white p10 br-25"><i class="fas fa-school"></i></i><span>'.htmlspecialchars($class['name']).'</span></li></a>';?>
<?php include('view/inc/nav.php');?>
<?php $content_col = ob_get_clean(); ?>
<div>
  <h2><i class="fas fa-cog mr-20 color-primary"></i>Paramètres de la classe</h2>
</div>
<div class="container p20 bg-white mt-20 br-25 gap20 nowrap">
  <div class="fg-1 fbasis0 container fd-column">
    <form method="post" action="classroom/<?= $_GET['id'] ?>/dideditsettings">
      <div class="subtitleIcon color-primary">
        <i class="fas fa-coin"></i>
        Points par défaut
      </div>
      <input type="text" name="defaultPoints" class="borderLight" placeholder="Points par défaut" value="<?php if(isset($class['defaultPoints'])){ echo $class['defaultPoints'];}?>"/>
      <div class="subtitleIcon mt-20 color-primary">
        <i class="fas fa-coins"></i>
        Points actuels
      </div>
      <input type="text" name="points" class="borderLight" placeholder="Points actuel" value="<?php if(isset($class['points'])){ echo $class['points'];}?>"/>
      <input type="submit" name="save" class="bg-lightPrimary mt-20" value="Sauvegarder"/>
    </form>
  </div>
  <div class="fg-1 fbasis0 container fd-column">
    <div>
      <div class="subtitleIcon colorLight">
        <i class="fas fa-info-circle"></i>
        Points par défaut
      </div>
      <p>
        Indiquez le nombre de points par défaut de la classe. En cas de remise à zéro, c'est ce nombre de points que la classe aura.
      </p>
    </div>
    <div class="mt-10">
      <div class="subtitleIcon colorLight">
        <i class="fas fa-info-circle"></i>
        Points actuels
      </div>
      <p>
        Vous pouvez modifier directement le nombre de points de la classe.
      </p>
    </div>
  </div>
</div>
<?php $content = ob_get_clean();
require('view/template_online.php'); ?>
