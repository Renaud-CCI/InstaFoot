<?php
session_start();
include_once('./conexion.php');


//--------------Préparation et enregistrement sur le serveur de la photo

// récupération de l'extension de la photo (.jpeg, .png...)
$photoExtensionBrute = explode('.', $_FILES['photo']['name']);
$photoExtension = strtolower(end($photoExtensionBrute));
//Tableau des extensions que l'on accepte
$extensions = ['jpg', 'png', 'jpeg', 'gif'];

// Vérification si l'on accepte ou pas
if(in_array($photoExtension, $extensions) && $_FILES['photo']['error'] == 0){
    $uniqueName = uniqid('', true);
    //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
    $photo = "../photosProfil/" . $uniqueName.".".$photoExtension;
    //$file = 5f586bf96dcd38.73540086.jpg
    move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
}
else{
    echo "Mauvaise extension";
}




// --------------Enregistrement du pseudo et de la phot en BDD
$requete = $bdd -> prepare ("   INSERT INTO users(pseudo, photoProfile ) 
                                VALUES (:pseudo,:photoProfile)");
$requete -> execute([
    "pseudo"=> $_SESSION['pseudo'],
    "photoProfile"=> $photo
]);


$_SESSION['photoProfile']=$photo;
//---------------Redirection vers l'index
header('Location: ../index.php');


