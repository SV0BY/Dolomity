<?php
require_once ("connect.php");
session_start();

echo "Vase jmeno: " . $_SESSION["Jmeno"] . "<br>";

if (isset($_SESSION["Email"])){
    echo "Vase email: " . $_SESSION["Email"] . "<br>";
}else{
    $stmt = $conn->prepare("SELECT email FROM uzivatele WHERE username = :username");
$stmt->bindParam(':username',$_SESSION["Jmeno"]);
$stmt->execute();
$email = $stmt->fetchColumn();
echo "Váš email: " . $email . "<br>";
}
