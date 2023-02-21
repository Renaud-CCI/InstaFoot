<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>insta-foot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./login.css">
  </head>

  <body>
    <h1>insta foot</h1>
    <?php 
    unset($_SESSION);

    if ( isset ($_GET['action' ])){
      $placeholder='pseudo non existant ';

    }
    else 
    $placeholder="saisie ton pseudo  "
    ?>
  


  <section class="conexion container text-center align-items-center d-flex justify-content-center">
  <div class="col-6 text-center">
    <form action="./linvisible/verif.php" method="get" >
      <label for="pseudo" class="form-label">Pseudo</label>
      <input id='pseudo' name='pseudo' type="text" class="form-control"   placeholder= "<?= $placeholder ?>" >
      <button type="submit" class="btn btn-primary">connecte toi </button>
    </form>
    <p>  inscrie toi par --> <a href="./inscription.php">la </a> </p>
  </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
