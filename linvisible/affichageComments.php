<?php

function affichageComments($id){
    $dns = "mysql:host=127.0.0.1;dbname=insta-foot";
    $user = "root";
    $password = "";

    try {
        $bdd = new PDO ($dns,$user,$password);
    } catch (Exception $message) {
        echo "il y a un souci <br>" . "<pre>$message</pre>";
    }

    $req = $bdd->prepare("  SELECT *, users.id as userId FROM comments
                            JOIN users ON users.id = comments.idUser
                            WHERE comments.idPhoto IN (:id)
                            ORDER BY date ASC");
    $req->execute(['id' => $id]);
    $echoComments = $req->fetchAll();

    foreach ($echoComments as $comment){
        echo"
            <div class='commentsDivs'>
                <a href='../profil.php?id={$comment['userId']}'> {$comment['pseudo']} </a> : 
                {$comment['comment']}
            </div>
        ";
    }
};

?>



