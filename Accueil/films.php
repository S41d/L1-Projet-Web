<?php
$film = $_GET['id'];

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/header.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <title><?php echo $film ?></title>
</head>
<body>

<header>
    <div class="logo">
        <a id="sandwitch-icon" onclick="sidebar()">
            <i class="material-icons">menu</i>
        </a>
        <a href="index.php">
            logo
        </a>
    </div>
    <div class="nav">
        <nav id="nav">
            <a href="../Forum/">Forum</a>
            <a href="../Con-Ins/connexion.php" id="connexion">Connexion</a>
            <a href="../Compte/profile.php" id="compte">Compte</a>
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30"
                       placeholder="Rechercher" onkeyup="searchFilm()">
            </div>
        </nav>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <a href="index.php">Accueil</a>
    <a href="../Forum/">Forum</a>
    <a href="../Compte/profile.php">Compte</a>
    <a href="../Con-Ins/connexion.php">Connexion</a>
</div>

<script src="../styles/style.js"></script>
</body>
</html>
