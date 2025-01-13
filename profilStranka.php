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
  <link type="text/css" href="style4.css" rel="stylesheet"/>
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
        <li><a href="logout.php"><div class="koupelna">Odhlásit se</div></a></li>
      </ul>
    </div>
  </div>

  <div class="obrazek">
    <img src="dolomity3.jpeg" alt="">
  </div>
  <div class="vodoznak">Vítejte</div>
  <div class="vodoznak1"> <?php echo $_SESSION["Jmeno"]; ?> <br> 
  
  <?php 
    if (isset($_SESSION["Email"])){
    echo "Váš E-mail: " . $_SESSION["Email"] . "<br>";
}else{
    $stmt = $conn->prepare("SELECT email FROM uzivatele WHERE username = :username");
$stmt->bindParam(':username',$_SESSION["Jmeno"]);
$stmt->execute();
$email = $stmt->fetchColumn();
echo "Váš E-mail: " . $email;
} 
?> 
</div>

<form action="poznamky.php" class="form" method="post">
  <p><label>Poznámky</label></p>
  <a href="poznamkyStranka.php">Napiš si poznámku</a>
</form>


 

  
  <footer>
    
  </footer>
</body>
</html>