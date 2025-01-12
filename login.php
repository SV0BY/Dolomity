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
          $_SESSION["Jmeno"] = $_POST['UserName'];
          $stmt = $conn->prepare("SELECT iduzivatele FROM uzivatele WHERE username = :username");
          $stmt->bindParam(':username',$_POST['UserName']);
          $stmt->execute();
          $id = $stmt->fetchColumn();
          $_SESSION["iduzivatel"] = $id;

            echo "Přihlášeno";
            header("Location: indexVeVnitr.html");
          }
          else { ?>
            <script>
              function myFunction() {
                window.location.href = "login.html";
                alert("Nesprávný uživatel nebo heslo");
                
              }
              myFunction();
            </script>
            <?php
            }

    }catch(PDOException $e) {
        echo $e->getMessage();
      }



    }else echo "Nepřišlo heslo";  

}else echo "Nepřišlo jméno.";