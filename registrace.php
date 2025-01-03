<?php


session_start();
require_once ("connect.php");
if(isset($_POST['UserName']) && isset($_POST['pass']) && isset($_POST['email'])){
   try {

    $stmt = $conn->prepare("INSERT INTO uzivatele (username, password, email)
  VALUES (:username, :password, :email)");
  $stmt->bindParam(':username', $_POST['UserName']);
  $stmt->bindParam(':password', $_POST['pass']);
  $stmt->bindParam(':email', $_POST['email']);

  $stmt -> execute();
  header("Location: indexVeVnitr.html");

  echo "Registrace probehla uspesne";
  $_SESSION["Jmeno"] = $_POST['UserName'];
  $_SESSION["Email"] = $_POST['email'];
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  } 
}else{
    echo "Robotus";
}


$conn = null;