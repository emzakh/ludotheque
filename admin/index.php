<?php
    session_start();
    // obligé d'avoir cette fonction quand on veut travailler avec les sessions
    // initialisation de la variable error
    $error="";
     // tester si le formulaire a été envoyé
    if(isset($_POST['login'])){
         // le formulaire est envoyé, maintenant on va tester s'il est bien rempli
        if($_POST['login']=="" || $_POST['password']==""){
           $error="Veuillez remplir le formulaire, merci!";
        }else{
            require "../connexion.php"; // attention il est à l'extérieur du dossier admin
              // protection des valeurs 
            $login=htmlspecialchars($_POST['login']);
            $password=htmlspecialchars($_POST['password']);

            // requête préparée car inconnue, le login
            $req = $bdd->prepare("SELECT * FROM admin WHERE login=?");
            $req->execute([$login]);

            if($don=$req->fetch()){
                // le login existe 
                // tester le mot de passe
                // password verify compare les valeurs non cryptées et cryptées (dans la bdd dans notre cas)
                if(password_verify($password,$don['password'])){
                    // les valeurs sont ok donc création des sessions et redirection
                    // les valeurs sont ok donc création des sessions et redirection
                    $_SESSION['login']=$don['login'];
                    $_SESSION['id']=$don['id'];
                    header("LOCATION:admin.php");
                }else{
                    $error="Votre mot de passe n'est pas bon";
                }
            }else{
                $error="Votre login n'existe pas";
            }
            $req->closeCursor();
        }
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
    <form action="index.php" method="POST">
        <div>
            <label for="login">Login: </label>
            <input type="text" name="login" id="login" value="">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" value="">
        </div>
        <div>
            <input type="submit" value="Connexion">
        </div>
    </form> 
    <?php
         // gestion de l'affichage des erreurs 
         // NB: La fonction empty() ne génère pas d'alerte si la variable n'existe pas.
        if(!empty($error)){
            echo "<div class='error'>".$error."</div>";
        }
    ?>
</body>
</html>