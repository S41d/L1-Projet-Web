<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link rel="stylesheet" href="../styles/hearder-sidebar.css">
    <link rel="stylesheet" href="../styles/styleAccueil/styleAccueil.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <script defer src="../sessionCheck.js"></script>
    <script defer src="../styles/style.js"></script>
    <script defer src="indexScript.js"></script>
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
            <a class="connexionButton" href="../Con-Ins/connexion.php" id="connexion">Connexion</a>
            <a class="compteButton" href="../Compte/profile.php" id="compte">Compte</a>
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
    <a class="compteButton" href="../Compte/profile.php">Compte</a>
    <a class="connexionButton" href="../Con-Ins/connexion.php">Connexion</a>
</div>

<div class="body" id="body">
    <?php
    include "../database.php";
    $queryfilm = 'Select `Link-Photo` From films';
    $result = $database->query($queryfilm) or die($database->error);
    while ($photos = $result->fetch_assoc()) {
        $link = implode($photos);
        $id = substr($link, 9, -4);
        echo "<a href=\"films.php?id=$id\" style=\"background-image: url($link);\" id=\"$id\"></a>";
    }
    ?>
</div>

</body>
</html>