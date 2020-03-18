<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1; dbname=projet', 'root', '');

if (isset($_POST['connecter'])) {

        $pseudoconnect = htmlspecialchars($_POST['connexionpseudo']);
        $mdpconnect = password_hash($_POST['connexionmdp'], PASSWORD_DEFAULT);

        if(!empty($pseudoconnect) AND !empty($mdpconnect)) {

           $requser = $bdd->prepare("SELECT * FROM users WHERE Pseudo = ? AND Password = ?");
           $requser->execute(array($pseudoconnect, $mdpconnect));
           $userexist = $requser->rowCount();
           $mdpconnect = $requser->fetch();

           $correctpassword = password_verify($_POST['connexionmdp'], $mdpconnect['connexionmdp'])

               if($userexist == 1) {
                    $userinfo = $requser->fetch();
                    $_SESSION['Iduser'] = $userinfo['Iduser'];
                    $_SESSION['Nom_Prenom'] = $userinfo['Nom_Prenom'];
                    $_SESSION['Pseudo'] = $userinfo['Pseudo'];
                    $_SESSION['Email'] = $userinfo['Email'];
                    header("Location: profil.php?id=".$_SESSION['Iduser']);

               } else {
                  $erreur = "Le pseudo ou le mot de passe est incorrect !";
               }

        } else {
           $erreur = "Il faut remplir tous les champs !";
        }
}


 ?>
<!DOCTYPE html>
<html lang="FR">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  <body>
    <h1>Connexion</h1>

      <form action="connexion.php" method="post">
          <label for="connexionpseudo">Pseudo</label> <br>
            <input type="text" name="connexionpseudo" placeholder="Pseudo" /> <br>
            <br>
          <label for="connexionmdp">Mot de passe</label> <br>
            <input type="password" name="connexionmdp" placeholder="*****" /> <br>
            <br>
            <input type="submit" name="connecter" value="Se connecter" />

      </form>

      <?php
        if (isset($erreur)) {
          echo $erreur;
        }
      ?>
  </body>
</html>
