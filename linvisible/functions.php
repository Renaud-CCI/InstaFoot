<?php

//----fonction pour vérifier si un user est abonnée au profil d'un autre
$followed = function($idAbonne, $idAbonnement){
    $dns = "mysql:host=127.0.0.1;dbname=insta-foot";
    $user = "root";
    $password = "";

    try {
        $bdd = new PDO ($dns,$user,$password);
    } catch (Exception $message) {
        echo "il y a un souci <br>" . "<pre>$message</pre>";
    }
    $req = $bdd->prepare("  SELECT count(id) FROM abonnements
                            WHERE idAbonne = :idAbonne
                            AND idAbonnement = :idAbonnement");
    $req->execute([
                    'idAbonne' => $idAbonne,
                    'idAbonnement' => $idAbonnement
                    ]);

    return $req->fetchColumn() > 0;
    // retourne true si il y a les deux idUser sur la même ligne, sinon false
};