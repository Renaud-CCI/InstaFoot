<?php
session_start();

require_once('./conexion.php');


$req = $bdd->prepare("  INSERT INTO comments (idUser, idPhoto, comment, date)
                        VALUES (:idUser, :idPhoto, :comment, NOW())");
$req->execute([ 
                'idUser' => $_SESSION['id'],
                'idPhoto' => $_GET['id'],
                'comment' => $_GET['comment']
                ]);

 //----------Retour vers l'index
 header('Location: ../index.php');