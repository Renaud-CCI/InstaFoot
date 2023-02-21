<?php session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insta Foot</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./inscription.css">
  </head>
  <body>
    <h1>insta foot</h1>
  <?php

if (isset ($_GET['action'])){
  if ($_GET['action'] == 'badFormat'){
    $placeholder = 'Votre photo n\'est pas dans un format valide';
  } else if ($_GET['action'] == 'loginExistant') {
    $placeholder = 'Pseudo déjà utilisé';
  } 
} else {
  $placeholder = 'Choisissez un pseudo';
}

if(!isset($_GET['pseudo'])){

   echo "
   <section class='container text-center align-items-center d-flex justify-content-center'>
      <form method='get' action='./inscription.php'>

        <div class='mb-3'>
          <label for='pseudo' class='form-label'>Choisi un pseudo</label>
          <input name='pseudo' type='text' class='form-control' id='pseudo' placeholder='{$placeholder}'>
        </div>

        <button type='submit' class='btn btn-primary'>Valider</button>

      </form>
    </section>";
  }
  else {
    $_SESSION['pseudo']=$_GET['pseudo'];

   echo " <section class='container text-center align-items-center d-flex justify-content-center'>
    <div class='col-6 text-center'> 
      <form method='post' action='./linvisible/enregistrement-inscription.php' enctype='multipart/form-data'>
        <div class='mb-3'>
          <label for='photo' class='form-label'>Choisi ta photo poto !</label>
          <input name='photo' type='file' class='form-control' id='photo' >
        </div>
        <button type='submit' class='btn btn-primary'>Valider</button>
      </form>
    </div>
    </section>";

}
?>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>



