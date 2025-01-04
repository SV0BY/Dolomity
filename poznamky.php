<?php
require_once ("connect.php");
session_start();

if (isset($_POST['poznamky'])) {
    $stmt = $conn->prepare("UPDATE poznamky SET poznamka = :poznamka WHERE iduzivatele = :iduzivatele");
    $stmt->bindParam(':poznamka', $_POST['poznamky']);
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); // Předpokládám, že iduzivatel je uložen v relaci
    $stmt->execute();

    header("Location: profilStranka.php");
}