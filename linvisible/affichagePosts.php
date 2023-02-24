<?php

function affichagePost($photoId){
    //-------Ouverture de la BDD (ça ne marche pas avec le require ?)
    $dns = "mysql:host=127.0.0.1;dbname=insta-foot";
    $user = "root";
    $password = "";

    try {
        $bdd = new PDO ($dns,$user,$password);
    } catch (Exception $message) {
    echo "il y a un souci <br>" . "<pre>$message</pre>";
    }



    //-------Création d'une liste d'ids à afficher
    $usersIds = [$photoId,];

    $req = $bdd->prepare("  SELECT abonnements.idAbonnement FROM abonnements
                            WHERE idAbonne = :idAbonne");
    $req->execute([ 'idAbonne' => $photoId]);
    $usersIdsReq = $req->fetchAll();
    foreach($usersIdsReq as $userIdReq){
        $usersIds[] = $userIdReq['idAbonnement'];
    }
    $usersIdsStr = implode(',',$usersIds);
 

    // ------Preparation des variables à afficher
    $req = $bdd->prepare("  SELECT *, photos.id as id FROM photos
                            JOIN users ON users.id = photos.idUser
                            WHERE photos.idUser IN ($usersIdsStr)
                            ORDER BY date DESC");
    $req->execute();
    $postsToEcho = $req->fetchAll();
    
    $stringAAfficher="";
    // -----Affichage des posts----
    foreach ($postsToEcho as $postToEcho){
        //Calcul du délai de post
        $now = time();
        $date2 = strtotime($postToEcho['date']);
        require_once('./linvisible/calculDelaiPost.php');
        $delay = dateDiff($now, $date2);

        //Affichage
        $stringAAfficher.= "
        <div class='postDiv w-50 container rounded bg-light'>
            <div class='row pseudoRow d-flex'>
                <form action='./profil.php' method='get' class='pb-0'>
                    <input type='hidden' name='id' value={$postToEcho['idUser']}>
                    <button id='photoProfileButton' type='submit' class='d-flex ps-2 pt-1 pb-0'>
                        <img class='photoProfile' src='{$postToEcho['photoProfile']}' alt='photo de profil'> 
                        <p class= 'm-0 p-0 ps-2'>{$postToEcho['pseudo']}</p>
                    </button>
                </form>
                <p id='delay' class='mb-1'>Posté il y a {$delay}</p>
            </div>
            <div class='row photoRow'>
                <img class='postPhoto' src='{$postToEcho['path']}' alt=''>
            </div>
            <div class='row postRow ps-3 sp-2'>
                {$postToEcho['post']}
            </div>
            <div class='comments row'>
                <form class='col-6' method='get' action='../linvisible/enregistrement-commentaire.php'>
                    <input type='hidden' name='id' value={$postToEcho['id']}>
                    <input type='text' name='comment' placeholder='Commentaire'>
                    <input type='submit' value='Commenter'>
                </form>";
                if (isset($_POST['idComment']) && $_POST['idComment'] != '' && $_POST['idComment'] == $postToEcho[0]){
                    $stringAAfficher.="
                    <form class='col-6 text-end' method='post' action='./index.php'>
                        <input type='hidden' name='idComment' value=''>
                        <input type='submit' value='Masquer les commentaires'>
                    </form>";
                } else{
                    $stringAAfficher.="
                    <form class='col-6 text-end' method='post' action='./index.php'>
                        <input type='hidden' name='idComment' value={$postToEcho['id']}>
                        <input type='submit' value='Afficher les commentaires'>
                    </form>
                ";
                }
                
                $stringAAfficher.="</div>";

            //Si "afficher commentaires" on affiche les com de ce post
            if (isset($_POST['idComment']) && $_POST['idComment'] == $postToEcho[0]){
                require_once('./linvisible/affichageComments.php');
                affichageComments($_POST['idComment']);
            } 
            
            $stringAAfficher.="
        </div>
        ";
    }
    return $stringAAfficher;
}
?>
