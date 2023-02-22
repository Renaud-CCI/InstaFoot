<?php
// session_start();
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

    // ------Preparation des variables à afficher
    $req = $bdd->prepare("  SELECT * FROM photos
                            JOIN users ON users.id = photos.idUser
                            WHERE photos.id = :photoId");
    $req->execute([ 'photoId' => $photoId]);
    $postToEcho = $req->fetch();

    // -----Affichage du post----
    echo "
    <div class='postDiv w-50 container rounded bg-light'>
    <div class='row pseudoRow'>
        <form action='./profil.php' method='get'>
            <input type='hidden' name='id' value={$postToEcho['idUser']}>
            <button id='photoProfileButton' type='submit' class='d-flex p-2'>
                <img class='photoProfile' src='{$postToEcho['photoProfile']}' alt='photo de profil'> 
                <p>{$postToEcho['pseudo']}</p>
            </button>
        </form>
    </div>
    <div class='row photoRow'>
        <img class='postPhoto' src='{$postToEcho['path']}' alt=''>
    </div>
    <div class='row postRow'>
        {$postToEcho['post']}
    </div>
</div>
    ";
}
?>
