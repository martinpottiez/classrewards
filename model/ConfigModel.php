<?php

class ConfigModel {

  protected function connect(){
    return new PDO('mysql:host=localhost;dbname=classroom;charset=utf8', 'root', 'root');
    //return new PDO('mysql:host=martinuclassroom.mysql.db;dbname=martinuclassroom;charset=utf8', 'martinuclassroom', 'Aqwzsxpmol951');
  }

}
