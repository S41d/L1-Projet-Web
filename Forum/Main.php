<?php
session_start();
include '../sessioncheck.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/styleForum/forumStyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Forum</title>
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
            <a href="../Con-Ins/connexion.php" id="connexion">Connexion</a>
            <a href="../Compte/profile.php" id="compte">Compte</a>
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30"
                       placeholder="Rechercher" onkeyup="search()">
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

<div class="body" id="body">
    <div class="Subs">
        <?php
        $database = new mysqli( 'localhost', 'root', '', 'projet' );
        $subquery = 'Select * From sub order by idsub desc ';
        $result = $database -> query( $subquery ) or die( 'can\'t connect to server to get subs' );
        echo '<a href="Main.createSub.php" class="newBtn" id="newBtn">New Sub</a>';
        while ($subname = $result -> fetch_assoc()) {
            echo '<a href="Subs.php?idsub=' . $subname['idsub'] . '">' . $subname['namesub'] . '</a>';
        }
        sessioncheck();
        sessioncheckForum();
        ?>
    </div>
</div>
<script src="../styles/style.js"></script>
<script src="search.js"></script>
</body>

</html>