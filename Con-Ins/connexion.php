<?php
session_start();

include "../database.php";

if (isset($_POST['connecter'])) {
    $pseudoconnect = htmlspecialchars($_POST['connexionpseudo']);
    $mdpconnect = password_hash($_POST['connexionmdp'], PASSWORD_DEFAULT);
    if (!empty($pseudoconnect) && !empty($mdpconnect)) {
//        print_r("pseudo connect = ". $pseudoconnect);
        $queryReqUser = "Select * from users where Pseudo = '$pseudoconnect'";
        $requser = $database -> query($queryReqUser);
        $row = $requser->fetch_assoc();
        $mdp = $row['Password'] ?? 'null';
        if (password_verify($_POST['connexionmdp'], $mdp)) {
            $_SESSION['Iduser'] = $row['Iduser'] ?? 'null';
            $_SESSION['Name'] = $row['Name'] ?? 'null';
            $_SESSION['Pseudo'] = $row['Pseudo'] ?? 'null';
            $_SESSION['Email'] = $row['Email'] ?? 'null';
            $_SESSION['Type'] = $row['accountType'] ?? 'null';
            header('Location: ../Accueil/index.php');
        } else {
            $erreur = 'Le pseudo ou le mot de passe est incorrect !';
        }
    } else {
        $erreur = 'Il faut remplir tous les champs !';
    }
}

?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="../styles/styleConIns/styleConnIns.css">
</head>
<body>

<form autocomplete="off" action="connexion.php" method="post">
    <div class="box">
        <h1>Connexion</h1>
        <input autocomplete="off" type="text" name="connexionpseudo" style="animation-delay:0.7s"
               placeholder="Pseudo"/>
        <input autocomplete="off" type="password" name="connexionmdp" style="animation-delay:0.8s"
               placeholder="Mot de passe"/>
        <input type="submit" name="connecter" value="Se connecter"/>
        <p>Vous n'avez pas de compte?  <a href="inscrire.php">Inscrivez-vous</a></p>
    </div>
</form>

<?php
if (isset($erreur)) {
    echo $erreur;
}
?>
</body>
</html>
