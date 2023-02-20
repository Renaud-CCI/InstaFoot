<?php session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>instafoot</title>
    <link rel="stylesheet" href="./css/inscription.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <section class="inscription container">
  <?php
  if(!isset($_GET['pseudo'])){

   echo "<form class='col-6'
  method='get' action='./inscription.php'>

  <div class='mb-3'>
    <label for='pseudo' class='form-label'>tapez votre pseudo</label>
    <input name='pseudo' type='text' class='form-control' id='pseudo' >
    
  </div>
  <button type='submit' class='btn btn-primary'>Submit</button>
</form>";
  }
  else {
    $_SESSION['pseudo']=$_GET['pseudo'];

   echo "<form class='col-6 '
   method='get' action='./linvisible/enregistrement-inscription.php'
   enctype='multipart/form-data'>
 
   <div class='mb-3'>
     <label for='photo' class='form-label'>met ta photo </label>
     <input name='photo' type='file' class='form-control' id='photo' >

    
     
   </div>
   <button type='submit' class='btn btn-primary'>Submit</button>
 </form>";

  }
?>
</section>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

