<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <?php if($rewrite){echo'<base href="../">';}?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="view/css/css.css" rel="stylesheet">
  </head>
  <body>
    <div class="container page">
      <div class="container alignc-start bg-primary nav-col p20">
        <div>
          <a href="">
            <img src="view/img/logo.png" alt="Logo de ClassRewards" class="logo"/>
          </a>
        </div>
        <div class="mt-20">
          <div><?php if(isset($error)){echo $error;}?></div>
          <form method="post" action="index/login">
            <input type="text" placeholder="Email" name="mail"/>
            <input type="password" placeholder="Mot de passe" name="password"/>
            <input type="submit" value="Connexion" name="login"/>
          </form>
        </div>
      </div>
      <div>
      </div>
    </div>
  </body>
</html>
