<?php

require_once('model/configModel.php');

class loginModel extends configModel {

  public function getUser($mail) {
    $db = $this->connect();
    $req = $db->prepare("SELECT * FROM users WHERE mail = :mail");
    $req->execute(array(
      'mail' => $mail
    ));
    return $req;
  }

  public function is_login($mail, $pass) {
    $is_user = $this->getUser($mail);
    if($is_user->rowCount() == 1) {
      $user = $is_user->fetch();
      if(password_verify($pass, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        return true;
      } else {
        throw new Exception("Identifiants incorrects");
      }
    } else {
      throw new Exception("Identifiants incorrects");
    }
  }

  public function register($userInfos) {
    $isUser = $this->getUser($userInfos[2]);
    if($isUser->rowCount() == 0) {
      $username = strtolower(substr($userInfos[1],0,2).$userInfos[0]);
      $password = password_hash($userInfos[3], PASSWORD_DEFAULT);
      $db = $this->connect();
      $req = $db->prepare("INSERT INTO users (username, mail, password, name, surname) VALUES (:username, :mail, :password, :name, :surname)");
      $req->execute(array(
        'username' => $username,
        'mail' => strtolower($userInfos[2]),
        'password' => $password,
        'name' => $userInfos[1],
        'surname' => $userInfos[0]
      ));
      return true;
    } else {
      throw new Exception("Adresse mail déjà utilisée");
    }
  }
}
