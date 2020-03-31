<?php
include '../sessioncheck.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="../style_general/header.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="../style_general/sidebar.css">
</head>
<body>

<header>
    <div class="logo">
        <a id="sandwitch-icon" onclick="sidebar()">
            <i class="material-icons">menu</i>
        </a>
        <a href="../Accueil/Index.php">
            logo
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
                <input type="text" id="barderechercher" size="30"
                       placeholder="Rechercher" onkeyup="searchFilm()">
            </div>
        </nav>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <a href="../Accueil/Index.php">Accueil</a>
    <a href="../Forum/Main.php">Forum</a>
    <a href="../Compte/profile.php">Compte</a>
    <a href="../Con-Ins/connexion.php">Connexion</a>
</div>

<div class="body" id="body">
    <?php
    $database = new mysqli( 'localhost', 'root', '', 'projet' );
    $queryfilm = 'Select `Link-Photo` From films';
    $result = $database -> query( $queryfilm ) or die( $database -> error );
    while ($photos = $result -> fetch_assoc()) {
        $link = implode( $photos );
        $id = substr( $link, 9, -4 ) . '/g';
        $a = substr( $id, 0, -2 );
        echo "<a href=\"films.php?id=$a\" style=\"background-image: url($link);\" id=\"$id\" '></a>";
    }
    ?>
</div>
<script src="../style_general/script.js"></script>
<script src="indexScript.js"></script>
<?php
sessioncheck();
?>
</body>
</html>