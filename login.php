<?php
session_start();

require_once ("connect.php");

if(isset($_POST['UserName']) && !empty($_POST['UserName'])) {
    if(isset($_POST['pass']) && !empty($_POST['pass'])) {
        
        try {

        $stmt = $conn->prepare("SELECT password from uzivatele where username=:username");
        $stmt->bindParam(':username', $_POST['UserName']);
        $stmt->execute();
        $hash = $stmt->fetchColumn();

        if (password_verify($_POST['pass'], $hash)) {
            $_SESSION["uzivatel"] = $_POST['UserName'];
            echo "Přihlášeno";
            header("Location: indexVeVnitr.html");
          }
          else echo "Nesprávný uživatel nebo heslo";

    }catch(PDOException $e) {
        echo $e->getMessage();
      }



    }else echo "Nepřišlo heslo";  

}else echo "Nepřišlo jméno.";