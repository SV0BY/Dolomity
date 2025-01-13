<?php

require_once ("connect.php");
session_start();

if (isset($_POST['poznamkyD1'])) {
    $stmt = $conn->prepare("UPDATE poznamky SET poznamka = NULL WHERE iduzivatele = :iduzivatele AND note_number = 1");
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); 
    $stmt->execute();

    header("Location: poznamkyStranka.php");
}

if (isset($_POST['poznamkyD2'])) {
    $stmt = $conn->prepare("UPDATE poznamky SET poznamka = NULL WHERE iduzivatele = :iduzivatele AND note_number = 2");
    $stmt->bindParam(':iduzivatele', $_SESSION['iduzivatel']); 
    $stmt->execute();

    header("Location: poznamkyStranka.php");
}