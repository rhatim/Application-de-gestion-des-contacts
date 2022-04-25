<?php
class connection {

  private $Host = "localhost";
  private $User = "root";
  private $Password = "";
  private $data_base_name = "gestion_des_contacts";

  protected function dbConnection() {
    try {
     $conn= new PDO("mysql:host=$this->Host; dbname=$this->data_base_name" ,$this->User ,$this->Password);      
     return $conn;
    }
    catch (Exception $excep) { 
        echo $excep->getMessage();
    }
  }

  protected function getData($data){
    try {
    $sql=$this->dbConnection()->prepare($data);
    return $sql; 
    }
    catch (Exception $excep) {
        echo $excep->getMessage();
    }
  }
}
?>