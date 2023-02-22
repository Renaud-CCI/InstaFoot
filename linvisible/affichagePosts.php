<?php
// session_start();
function affichagePost($photoId){
    include_once('linvisible/conexion.php');
    $req = $bdd->prepare("  SELECT * FROM photos
                            JOIN users ON users.id = photos.idUser
                            WHERE photos.id = :photoId");
    $req->execute([ 'photoId' => $photoId]);
    $postToEcho = $req->fetchAll();
    var_dump($postToEcho);
    die;
    echo "
    <div class='w-50 container rounded bg-light'>
    <div class='row pseudoRow'>
        <form action='./profil.php' method='get'>
            <input type='hidden' name='id' value={$postToEcho['idUser']}>
            <button id='photoProfileButton' type='submit' class='d-flex p-2'>
                <img class='photoProfile' src='{$_SESSION['photoProfile']}' alt='photo de profil'> 
                <p>{$_SESSION['pseudo']}</p>
            </button>
        </form>
    </div>
    <div class='row photoRow'>
        <img class='postPhoto' src='./imagesSysteme//Placeholder_view_vector.png' alt=''>
    </div>
    <div class='row postRow'>

    </div>
</div>
    ";
}
?>
