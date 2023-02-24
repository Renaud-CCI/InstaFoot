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
    <script src="https://kit.fontawesome.com/77138ed848.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
    <title>Insta Foot</title>
</head>

<body>

    <section id="topBar" class="container m-0">
        <form action="./profil.php" method="get">
            <input type="hidden" name='id' value=<?=$_SESSION['id']?>>
            <button id='photoProfileButton' type='submit' class='d-flex ps-2 pt-1 pb-0'>
                <img class='photoProfile' src='<?= $_SESSION['photoProfile']?>' alt='photo de profil'> 
                <p class= 'm-0 p-0 ps-2'><?= $_SESSION['pseudo']?></p>
            </button>
        </form>
        <a id="deconnexion" href="./login.php">Log Out</a>
    </section>

    <section id="affichagePosts">
        <?php
        require_once('./linvisible/affichagePosts.php');
        affichagePost($_SESSION['id']);
        
        ?>
        

    </section>

    <footer>
        <section id="actionContainer" class="container d-flex justify-content-center align-content-center text-center">

            <div id="searchDiv" class="col-2 p-2">
                <a id="search" href="./search.php"><i id="searchIcone" class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            <div id="ajoutPhotoDiv" class="col-2 p-2">
                <a id="ajoutPhotoLien" href="./ajoutPhoto.php"><i id="ajoutPhotoIcone" class="fa-solid fa-square-plus"></i></a>
            </div>

            <form action="./profil.php" class="col-2">
                <button id="photoProfileButton" type="submit" class=" p-2">
                    <input type="hidden" name='id' value=<?=$_SESSION['id']?>>
                    <img class="photoProfile" src="<?= $_SESSION['photoProfile']?>" alt="photo de profil">
                </button>
            </form>

        </section>
    </footer>

</body>
</html>
 