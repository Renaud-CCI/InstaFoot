<?php
session_start();
include_once('./conexion.php');
// echo"<br><br> FILES :";
// var_dump ($_FILES['photo']);
// echo"<br><br> POST :";
// var_dump ($_POST);
// echo"<br><br> SESSION :";
// var_dump ($_SESSION);

//--------------Préparation de la photo et enregistrement sur le serveur

    // récupération de l'extension de la photo (.jpeg, .png...)
    $photoExtensionBrute = explode('.', $_FILES['photo']['name']);
    $photoExtension = strtolower(end($photoExtensionBrute));
    //Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];

    // Vérification si l'on accepte ou pas
    if(in_array($photoExtension, $extensions) && $_FILES['photo']['error'] == 0){
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $photo = "../photosPosts/" . $uniqueName.".".$photoExtension;
        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    }
    else{
        header('Location: ../ajoutPhoto.php');
    }



    //--------------Enregistrement en BDD du post


    $requete = $bdd -> prepare ("   INSERT INTO photos(path, post, date, idUser) 
                                    VALUES (:path, :post, NOW(), :idUser) ");
    $requete -> execute([
        "path" => $photo,
        "post" => $_POST['commentaire'],
        "idUser" => $_SESSION['id']
    ]);

    //----------Retour vers l'index
    header('Location: ../index.php');