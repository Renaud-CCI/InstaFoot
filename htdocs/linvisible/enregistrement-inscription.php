<?php
session_start();
include_once('./conexion.php');
var_dump($_GET );
var_dump($_FILES);
echo "<br>";
var_dump($_SESSION);

die;
$requete = $bdd -> prepare ("INSERT INTO users(pseudo, photoProfile ) VALUES (pseudo=:pseudo,photoProfile=:photoProfile)");
$requete -> execute([
    "pseudo"=> $_GET['pseudo'],
    "photoProfile"=> $_GET['photo']


]);
