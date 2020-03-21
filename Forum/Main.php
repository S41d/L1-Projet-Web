<?php
session_start();
include '../sessioncheck.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="styles/Style-main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Forum</title>
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

<div class="Subs">
    <?php
    $database = new mysqli('localhost', 'root', '', 'projet');
    $subquery = 'Select * From sub';
    $result = $database->query($subquery) or die('can\'t connect to server to get subs');
    while ($subname = $result->fetch_assoc()) {
        echo '<a href="Sub.php?idsub=' . $subname['idsub'] . '">' . $subname['namesub'] . '</a>';
        echo '</br>';
    }
    sessioncheck();
    ?>
</div>

<script src="../Accueil/script.js"></script>
</body>

</html>