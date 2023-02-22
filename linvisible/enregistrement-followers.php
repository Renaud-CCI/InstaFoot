<?php
require_once('./conexion.php');

if ($_GET['action'] == 'Suivre'){
    // enregistrement en bdd
    $req = $bdd->prepare("  INSERT INTO abonnements (idAbonne, idAbonnement)
                            VALUES (:idAbonne, :idAbonnement)");
    $req->execute([ 
                    'idAbonne' => $_GET['idAbonne'],
                    'idAbonnement' => $_GET['idAbonnement']
                    ]);

} else {
    //--------Effacemment en bdd
    //obtention de l'id de l'abonnement
    $req = $bdd->prepare("  SELECT id FROM abonnements
                            WHERE idAbonne = :idAbonne
                            AND idAbonnement = :idAbonnement");
    $req->execute([ 
                    'idAbonne' => $_GET['idAbonne'],
                    'idAbonnement' => $_GET['idAbonnement']
                    ]);
    $abonnementId = $req->fetch();

    //supression
    $req = $bdd->prepare("  DELETE FROM abonnements
                            WHERE id = :abonnementId");
    $req->execute([ 
                    'abonnementId' => $abonnementId['id']
                    ]);
}


// retour sur le profil
header("Location:../profil.php?id=" . $_GET['idAbonnement']);

