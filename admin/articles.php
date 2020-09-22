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
    <h1>Administration des produits</h1>
    <a href="addProduct.php">Ajouter un produit</a>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>type</th>
            <th>editeur</th>
            <th>support</th>
            <th>action</th>
        </tr>
        <?php
            require "../connexion.php"; 
            $req = $bdd->query("SELECT * FROM jeux");
            while($don = $req->fetch()){
                echo "<tr>";
                    echo "<td>".$don['id']."</td>";
                    echo "<td>".$don['nom']."</td>";
                    echo "<td>".$don['type']."</td>";
                    echo "<td>".$don['editeur']."</td>";
                    echo "<td>".$don['support']."</td>";
                  
                    echo "<td>";
                        echo "<a href='updateProduct.php?id=".$don['id']."'>Modifier</a>";
                        echo "<a href='deleteProduct.php?id=".$don['id']."'>Supprimer</a>";
                    echo "</td>";
                echo "</tr>";
            }
            $req->closeCursor();
            
        ?>


    </table>
</body>
</html>