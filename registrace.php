<?php


session_start();
  require_once ("connect.php");
    if(isset($_POST['UserName']) && isset($_POST['pass']) && isset($_POST['email'])){
      try { // Check if username already exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM uzivatele WHERE username = :username");
        $stmt->bindParam(':username', $_POST['UserName']);
        $stmt->execute();
        $userExists = $stmt->fetchColumn();

    if ($userExists) {
      ?>
      <script>
        function myFunction() {
          window.location.href = "stranka2.html";
          alert("Uživatel již existuje");
          
        }
        myFunction();
      </script>
      <?php

    } else{
      $stmt = $conn->prepare("INSERT INTO uzivatele (username, password, email)
                              VALUES (:username, :password, :email)");
  $stmt->bindParam(':username', $_POST['UserName']);
  $stmt->bindParam(':password', $heslo);
  $stmt->bindParam(':email', $_POST['email']);

  $heslo = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  
  $stmt -> execute();


  $stmt = $conn->prepare("SELECT iduzivatele FROM uzivatele WHERE username = :username");
  $stmt->bindParam(':username',$_POST['UserName']);
  $stmt->execute();
  $id = $stmt->fetchColumn();

  $stmt = $conn->prepare("INSERT INTO poznamky (iduzivatele, note_number)
                            VALUES (:iduzivate, 1)"); 
  $stmt->bindParam(':iduzivate', $id); 
  $stmt->execute();

  $stmt = $conn->prepare("INSERT INTO poznamky (iduzivatele, note_number)
  VALUES (:iduzivate, 2)"); 
$stmt->bindParam(':iduzivate', $id); 
$stmt->execute();  



  header("Location: indexVeVnitr.html");

  echo "Registrace probehla uspesne";
  $_SESSION["Jmeno"] = $_POST['UserName'];
  $_SESSION["Email"] = $_POST['email'];
  $_SESSION["iduzivatel"] = $id;
    }

    
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  } 
}else{
    echo "Robotus";
}


$conn = null;