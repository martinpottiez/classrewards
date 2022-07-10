<?php include('inc/head.php'); ?>
      <div class="container alignc-start bg-primary nav-col p20">
        <div class="center">
          <a href="">
            <img src="view/img/logo.png" alt="Logo de JollyClass" class="logo"/>
          </a>
        </div>
        <div class="mt-20">
          <div class="subtitleIcon colorLight"><i class="fas fa-sign-in-alt"></i><span class="">Connexion</span></div>
          <div><?php if(isset($error)){echo $error;}?></div>
          <form method="post" action="index/login">
            <input type="text" placeholder="Adresse mail" name="mail"/>
            <input type="password" placeholder="Mot de passe" name="password"/>
            <input type="submit" value="Connexion" class="bg-lightPrimary" name="login"/>
          </form>
          <div class="center"><a href="">Identifiants oubliés</a></div>
        </div>
      </div>
      <div class="container fd-column fg-1 p20">
        <?= $content ?>
      </div>
    </div>
  </body>
</html>
