<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1; dbname=projet', 'root', '');

if (isset($_POST['connecter'])) {

    $pseudoconnect = htmlspecialchars($_POST['connexionpseudo']);
    $mdpconnect = password_hash($_POST['connexionmdp'], PASSWORD_DEFAULT);

    if (!empty($pseudoconnect) && !empty($mdpconnect)) {
        $requser = $bdd->prepare('Select * from users where Pseudo = ?');
        $requser->execute(array($pseudoconnect));
        $row = $requser->fetch(PDO::FETCH_ASSOC);
        $mdp = $row['Password'] ?? 'null';
        if (password_verify($_POST['connexionmdp'], $mdp)) {
            $_SESSION['Iduser'] = $row['Iduser'] ?? 'null';
            $_SESSION['Name'] = $row['Name'] ?? 'null';
            $_SESSION['Pseudo'] = $row['Pseudo'] ?? 'null';
            $_SESSION['Email'] = $row['Email'] ?? 'null';
            $_SESSION['Type'] = $row['accountType'] ?? 'null';
            header('Location: ../Compte/profile.php');

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
    <title>Connexion</title>
</head>
<body>
<h1>Connexion</h1>

<form action="connexion.php" method="post">
    <label for="connexionpseudo">Pseudo</label> <br>
    <input type="text" name="connexionpseudo" placeholder="Pseudo"/> <br>
    <br>
    <label for="connexionmdp">Mot de passe</label> <br>
    <input type="password" name="connexionmdp" placeholder="*****"/> <br>
    <br>
    <input type="submit" name="connecter" value="Se connecter"/>

    <p>ou <a href="inscrire.php">inscrivez-vous</a></p>

</form>

<?php
if (isset($erreur)) {
    echo $erreur;
}
?>
</body>
</html>
