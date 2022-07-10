<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <?php if($rewrite){
      switch(count($_GET)){
        case 2:
          echo'<base href="../../">';
        break;
        default:
         echo'<base href="../">';
      }
    }?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="view/css/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container page nowrap">
