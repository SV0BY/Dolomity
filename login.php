<?php
session_start();

require_once ("connect.php");

if(isset($_POST['UserName']) && isset($_POST['pass']) && isset($_POST['email'])){


    try {

        $stmt = $vada->prepare("SELECT heslo from uzivatel where jmeno=:jmeno");
        $stmt->bindParam(':username', $_POST['UserName']);
        $hash = $stmt->fetchColumn();

    }
}else{

}