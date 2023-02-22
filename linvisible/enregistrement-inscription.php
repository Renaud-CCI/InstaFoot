<?php
session_start();
include_once('./conexion.php');



// ------vérification si pseudo existant ou pas
$req = $bdd->prepare("SELECT count(id) FROM users WHERE LOWER(pseudo) = :pseudo");
$req->execute([ 'pseudo' => strtolower($_SESSION['pseudo'])
                ]);

if($req->fetchColumn() > 0)
{
// 'Pseudo déjà utilisé !' on renvoie en arriere
    header('Location: ../inscription.php?action=loginExistant');
}
else
{
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
        header('Location: ../inscription.php?action=badFormat');
    }


    // --------------Enregistrement du pseudo et de la photo en BDD
    $requete = $bdd -> prepare ("   INSERT INTO users(pseudo, photoProfile ) 
                                    VALUES (:pseudo,:photoProfile)");
    $requete -> execute([
        "pseudo"=> $_SESSION['pseudo'],
        "photoProfile"=> $photo
    ]);

    //------------Enregistrement des infos dans $_SESSION  --------
    //ouverture de la BDD et affichage des infos du pseudo
    $req = $bdd->prepare("SELECT * FROM users WHERE LOWER(pseudo) = :pseudo");
    $req->execute([ 'pseudo' => strtolower($_SESSION['pseudo'])
                ]);
    $infos = $req -> fetch();


    $_SESSION['photoProfile']=$infos['photoProfile'];
    $_SESSION['id']=$infos['id'];
    $_SESSION['pseudo']=$infos['pseudo'];



    //---------------Redirection vers l'index
    header('Location: ../index.php');

}


