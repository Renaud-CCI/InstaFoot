<?php
session_start();
include_once('./conexion.php');
// ------vérification si pseudo existant ou pas
$req = $bdd->prepare("SELECT count(id) FROM users WHERE LOWER(pseudo) = :pseudo");
$req->execute([ 'pseudo' => strtolower($_GET['pseudo'])
                ]);

if($req->fetchColumn() > 0)
{
// 'Pseudo existe!' on rempli la $_SESSION et on renvoie à l'index
    $req = $bdd->prepare("SELECT * FROM  users WHERE LOWER(pseudo) = :pseudo");
$req->execute([ 'pseudo' => strtolower($_GET['pseudo'])
]);
//------- afichage des colone de pseudo 
$resultas= $req -> fetch() ;
 $_SESSION['pseudo']=$resultas['pseudo'];
 $_SESSION['photoProfile']=$resultas['photoProfile'];
 $_SESSION['id']=$resultas['id']; 
header('Location: ../index.php')  ; 
}
else
{
   // Retour vers la page login avec le placeholder 'pseudo inexistant'
   header('Location: ../login.php?action=loginInconnu');
}
    
    
    ?>