<?php
include 'films.php';
session_start();
include '../sessioncheck.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
<div class="sidebar"></div>

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

<div class="body">
    <?php
    showFims();
    ?>
</div>
<script src="script.js"></script>
<?php
    sessioncheck();
?>
</body>
</html>