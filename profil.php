<?php
require_once ("connect.php");
session_start();

echo "Vase jmeno: " . $_SESSION["Jmeno"] . "<br>";
echo "Vase email: " . $_SESSION["Email"] . "<br>";