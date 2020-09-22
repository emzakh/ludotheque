<?php
    session_start();
     // sécurité 
    // tester si session sinon redirection
    if(!isset($_SESSION['login'])){
        header("LOCATION:403.php");
    }

     // si get deco
    if(isset($_GET['deco'])){
        session_destroy(); // destruction de la session (attention elle reste dans le cache)
        header("LOCATION:index.php"); // renvoyer sur la page index
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Administration</h1>
    <a href="admin.php?deco=ok">Déconnexion</a><br>
    <a href="articles.php">Gestion des produits</a>
</body>
</html>