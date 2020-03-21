<?php
session_start();
include '../sessioncheck.php';

$postid = $_GET['id'];
$database = new mysqli('localhost', 'root', '', 'projet');
$postquery = "Select * from posts where Idpost = $postid ";
$result = $database->query($postquery) or die('can\'t connect to server to get posts');
$post = $result->fetch_assoc();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $post['Title'] ?></title>
    <link rel="stylesheet" href="../header.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>

<header>
    <div class="logo">
        <a href="../Accueil/Index.php">
            <img src="../logo.jpeg" alt="logo">
        </a>
    </div>
    <div class="nav">
        <nav id="nav">
            <a href="../Forum/Main.php">Forum</a>
            <a href="../Con-Ins/connexion.php" id="connexion">Connexion</a>
            <a href="../Compte/profile.php" id="compte">Compte</a>
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30" placeholder="Rechercher">
            </div>
        </nav>
    </div>
</header>

<?php
echo $post['Title'];
echo '</br>';
echo $post['Body'];
echo '</br>';




sessioncheck();
?>

<script src="../Accueil/script.js"></script>
</body>
</html>


