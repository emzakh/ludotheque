<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("LOCATION:403.php");
    }

    if(isset($_GET['id'])){
        $id=htmlspecialchars($_GET['id']);
        require "../connexion.php";
        $req=$bdd->prepare("SELECT * FROM jeux WHERE id=?");
        $req->execute([$id]);
     
        if(!$don=$req->fetch()){
            header("LOCATION:articles.php"); 
        }

        $req->closeCursor();

    }else{
        header("LOCATION:articles.php");
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
    <h1>Modifier le produit: <?= $don['nom'] ?></h1>
    <form action="treatmentUploadProduct.php?id=<?= $don['id'] ?>" method="POST" enctype="multipart/form-data">
        <!--
        <div>
            <input type="hidden" name="id" value="<?= $don['id'] ?>">
        </div>
        -->
        <div>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" id="nom" value="<?= $don['nom'] ?>">
        </div>
        <div>
            <label for="type">Type: </label>
            <input type="text" name="type" id="type" value="<?= $don['type'] ?>">
        </div>
        <div>
            <label for="editeur">Editeur: </label>
            <input type="text" name="editeur" id="editeur" value="<?= $don['editeur'] ?>">
        </div>
        <div>
            <p>Pochette  <img src="<?= $don['pochette']?>"></p>
            <label for="pochette">Pochette: </label>
            <input type="file" name="pochette" id="pochette">
        </div>
        <div>
        <label for="support">Support:</label>
        <input type="text" name="support" id="support" value="<?=$don['support'] ?>">
        
        </div>

        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>
</body>
</html>