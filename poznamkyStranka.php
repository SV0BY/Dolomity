<?php
require_once ("connect.php");
session_start();
if (!isset($_SESSION['Jmeno'])) { header("Location: index.html"); exit; }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loudavým krokem</title>
  <link type="text/css" href="poznamky.css" rel="stylesheet"/>
</head>
<body>
  <div class="navbar">
    <div class="navbar-left">
      <div class="navbar-logo">
        <ul>
          <li><a href="indexVeVnitr.html"><img src="https://loudavymkrokem.cz/wp-content/uploads/2023/05/loudavy-krokem-logo-cerne.png" alt=""></a>
          </li>
        </ul>
      </div>
      <ul class="pismo">

        <li><a href="indexVeVnitr.html"> Domů </a></li>
        <li><a href="profilStranka.php"><div class="koupelna">Profil</div></a></li>
      </ul>
    </div>
  </div>

  <div class="obrazek">
    <img src="dolomity3.jpeg" alt="">
  </div>
  <div class="vodoznak">Poznámky</div>
</div>

<form action="poznamky.php" class="form" method="post">
  <p><label>Poznámka1</label></p>
  <textarea id="poznamky" name="poznamky" rows="4" cols="50" maxlength="255"> 
    <?php 

        $stmt = $conn->prepare("SELECT poznamka FROM poznamky WHERE iduzivatele = :iduzivatele AND note_number = 1");
        $stmt->bindParam(':iduzivatele',$_SESSION["iduzivatel"]);
        $stmt->execute();
        $poznm = $stmt->fetchColumn();
        echo $poznm; 
    ?> 
  </textarea>
  <br>
  <input type="submit" name="action1" value="Uložit">
  <input type="submit" name="action2" value="Upravit">
  
      
</form>

<form action="vymazat.php" class="form3" method="post" >
  <input type="hidden" name="poznamkyD1" value="">
  <input type="submit" value="Vymazat">
      </form>


<form action="poznamky.php" class="form2" method="post">
  <p><label>Poznámka2</label></p>
  <textarea id="poznamky" name="poznamky2" rows="4" cols="50" maxlength="255"> 
    <?php 

        $stmt = $conn->prepare("SELECT poznamka FROM poznamky WHERE iduzivatele = :iduzivatele AND note_number = 2");
        $stmt->bindParam(':iduzivatele',$_SESSION["iduzivatel"]);
        $stmt->execute();
        $poznm = $stmt->fetchColumn();
        echo $poznm; 
    ?> 
  </textarea>
  <br>
  <input type="submit" name="action3" value="Uložit">
  <input type="submit" name="action4" value="Upravit">
      
</form>

<form action="vymazat.php" class="form4" method="post" >
  <input type="hidden" name="poznamkyD2" value="">
  <input type="submit" value="Vymazat2">
      </form>
 

  
  <footer>
    
  </footer>
</body>
</html>