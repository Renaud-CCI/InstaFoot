<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/77138ed848.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/ajoutPhoto.css">
    <title>Insta Foot</title>
</head>
<body>
<h1>insta foot</h1>
  <section class='container text-center align-items-center d-flex justify-content-center'>

    <div class='col-6 text-center'> 
      <form method='post' action='./linvisible/enregistrement-ajoutPhoto.php' enctype='multipart/form-data'>

        <div class='mb-3'>
          <label for='photo' class='form-label'>Importer une photo</label>
          <input name='photo' type='file' class='form-control' id='photo' accept=".png, .jpg, .jpeg">
        </div>

        <div class="preview">
          <p>Aucun fichier sélectionné pour le moment</p>
        </div>

        <div class='mb-3'>
          <label for='commentaire' class='form-label'>Saisissez votre post</label>
          <input name='commentaire' type='text' class='form-control' id='commentaire' >
        </div>
        
        <button type='submit'>Valider</button>
      </form>
      <a href="./index.php">Annuler</a>
    
    </div>
  </section>

  <script type="text/javascript" src="./JS/ajoutPhoto.js"></script>
</body>
</html>
