<?php
require_once ("connect.php");
session_start();

 $stmt = $conn->prepare("SELECT poznamka FROM poznamky WHERE iduzivatele = :iduzivatele AND note_number = 1");
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']);
    $stmt->execute();
    $poznm = $stmt->fetchColumn();

    $stmt = $conn->prepare("SELECT poznamka FROM poznamky WHERE iduzivatele = :iduzivatele AND note_number = 2");
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']);
    $stmt->execute();
    $poznm2 = $stmt->fetchColumn();   

if ( isset($_POST['action1'])  && $_POST['action1'] == "Uložit" && $poznm == NULL) {
   if (isset($_POST['poznamky'])) {
    $stmt = $conn->prepare("UPDATE poznamky SET poznamka = :poznamka WHERE iduzivatele = :iduzivatele AND note_number = 1");
    $stmt->bindParam(':poznamka', $_POST['poznamky']);
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); 
    $stmt->execute();

    header("Location: poznamkyStranka.php");
}
}elseif(isset($_POST['action1'])  && $_POST['action1'] == "Uložit" && $poznm != NULL){

    ?>
      <script>
        function myFunction() {
          window.location.href = "poznamkyStranka.php";
          alert("Nemužete uložit, musíte upravit");
          
        }
        myFunction();
      </script>
      <?php
}

if (  isset($_POST['action3'])  &&  $_POST['action3'] == "Uložit" && $poznm2 == NULL){

    if (isset($_POST['poznamky2'])) {
    $stmt = $conn->prepare("UPDATE poznamky SET poznamka = :poznamka WHERE iduzivatele = :iduzivatele AND note_number = 2");
    $stmt->bindParam(':poznamka', $_POST['poznamky2']);
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); 
    $stmt->execute();

    header("Location: poznamkyStranka.php");
}
}elseif(isset($_POST['action3'])  && $_POST['action3'] == "Uložit" && $poznm2 != NULL){

    ?>
      <script>
        function myFunction() {
          window.location.href = "poznamkyStranka.php";
          alert("Nemužete uložit, musíte upravit");
          
        }
        myFunction();
      </script>
      <?php
}


if ( isset($_POST['action2'])  && $_POST['action2'] == "Upravit" && $poznm != NULL) {
    if (isset($_POST['poznamky'])) {
     $stmt = $conn->prepare("UPDATE poznamky SET poznamka = :poznamka WHERE iduzivatele = :iduzivatele AND note_number = 1");
     $stmt->bindParam(':poznamka', $_POST['poznamky']);
     $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); 
     $stmt->execute();
 
     header("Location: poznamkyStranka.php");
 }
 }elseif(isset($_POST['action2'])  && $_POST['action2'] == "Upravit" && $poznm == NULL){
 
     ?>
       <script>
         function myFunction() {
           window.location.href = "poznamkyStranka.php";
           alert("Musíte uložit");
           
         }
         myFunction();
       </script>
       <?php
 }



 if (  isset($_POST['action4'])  &&  $_POST['action4'] == "Upravit" && $poznm2 != NULL){

    if (isset($_POST['poznamky2'])) {
    $stmt = $conn->prepare("UPDATE poznamky SET poznamka = :poznamka WHERE iduzivatele = :iduzivatele AND note_number = 2");
    $stmt->bindParam(':poznamka', $_POST['poznamky2']);
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); 
    $stmt->execute();

    header("Location: poznamkyStranka.php");
}
}elseif(isset($_POST['action4'])  && $_POST['action4'] == "Upravit" && $poznm2 == NULL){

    ?>
      <script>
        function myFunction() {
          window.location.href = "poznamkyStranka.php";
          alert("Musíte uložit"); 
          
        }
        myFunction();
      </script>
      <?php
}
