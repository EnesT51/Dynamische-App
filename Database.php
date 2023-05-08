<?php
  function PDO(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'character';

    try{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo "Connection failed:". $e->getMessage();
    }
    return $conn;
  }
    
?>