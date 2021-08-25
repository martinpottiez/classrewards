<?php include('inc/head.php'); ?>
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
