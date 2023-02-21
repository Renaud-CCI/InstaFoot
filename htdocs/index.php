<?php
session_start();

if (!isset($_SESSION['pseudo'])){
    header("Location:../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://kit.fontawesome.com/77138ed848.css" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Insta Foot</title>
</head>
<body>
    <section id="topBar">
        <form action="./profil.php">
            <button type="submit">
                <p><?= $_SESSION['pseudo']?></p>
                <img class="photoProfile" src="<?= $_SESSION['photoProfile']?>" alt="photo de profil"> 
            </button>
        </form>
        <a href="./login.php">Se deconnecter</a>
    </section>

    <footer>
        <section id="actionContainer" class="container d-flex align-items-center text-center">
            <div id="ajoutPhotoDiv" class="col-2">
                <a id="ajoutPhotoLien" href="./linvisible/ajoutPhoto.php"><i class="fa-solid fa-square-plus"></i></a>
            </div>
        </section>
    </footer>
</body>
</html>
 