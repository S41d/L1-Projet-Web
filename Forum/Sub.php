<?php
session_start();
include '../sessioncheck.php';
?>

<!doctype html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="styles/Style-Subs.css">
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

<div class="Posts">

<?php
function showPosts() {
    $database = new mysqli('localhost', 'root', '', 'projet');
    $idsub = $_GET['idsub'];
    $query = "Select * from posts where idsub=$idsub";
    $result = $database->query($query);
    while ($posts = $result->fetch_assoc()){
        echo '<a href="Posts.php?id='. $posts['Idpost'] .'">'. $posts['Title'] .'</a>'. '</br>';
    }
}
showPosts();
sessioncheck();
?>

</div>

<script src="../Accueil/script.js"></script>
</body>
</html>

