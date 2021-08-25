<?php

require_once('model/configModel.php');

class loginModel extends configModel{

  public function getUser($mail, $pass){
    $db = $this->connect();
    $req = $db->prepare("SELECT * FROM users WHERE mail = :mail");
    $req->execute(array(
      'mail' => $mail
    ));
    return $req;
  }

  public function is_login($mail, $pass){
    $is_user = $this->getUser($mail, $pass);
    if($is_user->rowCount() == 1){
      $user = $is_user->fetch();
      if(password_verify($pass, $user['password'])){
        $_SESSION['id'] = $user['id'];
        return true;
      } else {
        throw new Exception("Identifiants incorrects");
      }
    } else {
      throw new Exception("Identifiants incorrects");
    }
  }
}
