<?php
require_once ("connect.php");
session_start();

if (isset($_POST['poznamky'])) {
    $stmt = $conn->prepare("UPDATE poznamky SET poznamka = :poznamka WHERE iduzivatele = :iduzivatele AND note_number = 1");
    $stmt->bindParam(':poznamka', $_POST['poznamky']);
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); 
    $stmt->execute();

    header("Location: poznamkyStranka.php");
}

if (isset($_POST['poznamky2'])) {
    $stmt = $conn->prepare("UPDATE poznamky SET poznamka = :poznamka WHERE iduzivatele = :iduzivatele AND note_number = 2");
    $stmt->bindParam(':poznamka', $_POST['poznamky2']);
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); 
    $stmt->execute();

    header("Location: poznamkyStranka.php");
}