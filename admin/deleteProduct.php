<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("LOCATION:403.php");
    }

    // on a besoin de l'id donc on teste la présence
    if(isset($_GET['id'])){
        $id=htmlspecialchars($_GET['id']);
        require "../connexion.php";
        // recherche dans la base de données pour afficher les infos et supprimer si confirmation
        $req=$bdd->prepare("SELECT * FROM articles WHERE id=?");
        $req->execute([$id]);
     
        // dans le cas où l'id ne trouve pas de correspondance
        if(!$don=$req->fetch()){
            header("LOCATION:articles.php"); 
        }

        $req->closeCursor();

    }else{
        header("LOCATION:articles.php");
    }

    // si on a dans l'url la variable delete
    if(isset($_GET['delete'])){
        // suppresion de l'image si l'entrée en possède une
        if(!empty($don['image'])){
            unlink("../images/".$don['image']);
        }
        // suppresion de l'entrée dans la base de données
        $delete=$bdd->prepare("DELETE FROM jeux WHERE id=?");
        $delete->execute([$id]);
        $delete->closeCursor();
        header("LOCATION:articles.php?delete=success");
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
    <h1>Supprimer? <?= $don['nom'] ?></h1>
    <!-- ne pas oublier lors du rechargement de la page avec le get delete de renvoyer l'id -->
    <h2><a href="deleteProduct.php?id=<?= $don['id'] ?>&delete=accept">Oui</a></h2>
    <h2><a href="articles.php">Non</a></h2>


</body>
</html>