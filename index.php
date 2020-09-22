<?php
    require "connexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ludo</title>
</head>
<body>
    <h1>Ludotheque</h1>
    <?php
         // requête sans variable, c'est toujours la même requête sql sans inconnue
         $req = $bdd->query("SELECT * FROM jeux");
         // $req le nom (libre) de notre requête
         // $bdd fait référence à notre connexion PDO dans le fichier connexion.php
         // POO -> on demande la méthode (fonction) query qui fait une requête SQL sans préparation pour une inconnue
 
         // boucle tant que avec la condition $don = true -> la réponse de la méthode $req->fetch() donne true au test, si false, on arrête la boucle
         while($don = $req->fetch())
         {
             // echo pour afficher - 2 types de valeur : string (chaîne de caractères) et variable php ($)
             // technique: on écrit la chaine de KK en une fois et ensuite on découpe en faisant attention au délimiteur utilisé (simple quote ou double quote)
             // echo "<div><a href='produit.php?id='></a></div>";
             echo "<div><a href='produit.php?id=".$don['id']."'>".$don['nom']."</a></div>";
         }
         $req->closeCursor();
         // facultatif avec mysql - ferme la connexion et vide le contenu de la variable $req (attention pas $don)
        
    ?>
</body>
</html>