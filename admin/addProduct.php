<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("LOCATION:403.php");
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
    <h1>Ajouter un produit</h1>
    <form action="treatmentAddProduct.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" id="nom" value="">
        </div>
        <div>
            <label for="type">Type: </label>
            <input type="text" name="type" id="type" value="">
        </div>
        <div>
            <label for="editeur">Editeur: </label>
            <input type="text" name="type" id="type" value="">
        </div>
        <div>
            <label for="pochette">Pochette: </label>
            <input type="file" name="pochette" id="image">
        </div>
        <div>
        <label for="support">Support: </label>
        <input type="text" name="nom" id="nom" value="">
        </div>
        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>
</body>
</html>