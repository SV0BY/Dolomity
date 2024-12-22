<?php


session_start();
require_once ("connect.php");
if(isset($_POST['UserName']) && isset($_POST['pass'])){
   try {

    $stmt = $conn->prepare("INSERT INTO uzivatele (username, password)
  VALUES (:username, :password)");
  $stmt->bindParam(':username', $_POST['UserName']);
  $stmt->bindParam(':password', $_POST['pass']);

  $stmt -> execute();

  echo "Registrace probehla uspesne";
  $_SESSION["Jmeno"] = $_POST['UserName'];
  
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  } 
}else{
    echo "Robotus";
}


$conn = null;