<?php

$servername = "127.0.0.1";
$username = "svobodajakub8";
$password = "kr@KEN-021110";

try {
  $conn = new PDO("mysql:host=$servername;dbname=svobodajakub8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}