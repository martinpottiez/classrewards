<?php

class configModel {

  protected function connect(){
    return new PDO('mysql:host=localhost;dbname=classroom;charset=utf8', 'root', 'root');
    //return new PDO('mysql:host=martinuclassroom.mysql.db;dbname=martinuclassroom;charset=utf8', 'martinuclassroom', 'Aqwzsxpmol951');
  }

  public function returnNumber($req){
    return $req->rowCount();
  }

}
