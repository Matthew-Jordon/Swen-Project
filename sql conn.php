<?php

class db_conn{
  private $servername;
  private $user;
  private $password;
  private $dbase;
  private $charset;

  public function connect(){
    $this->servername = "localhost";
    $this->user = "test";
    $this->password = "Comp2140";
    $this->dbase = " eilps";
    $this->charset = "utf8mb4";

    try{
      //create connection
    $dsn = "mysql:host=".$this->$servername.";dbname=".$this->dbname.";charset=".$this->charset;
    $pdo = new PDO($dsn,$this->user,$this->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
   
    }catch (PDOException $e){
    echo "Connection failed: ".$e->getMessage;
  }
  
  }
}


?>