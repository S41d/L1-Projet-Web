<?php
session_start();
include '../sessioncheck.php';

$database = new mysqli( 'localhost', 'root', '', 'projet' );
$idsub = $_GET['idsub'];
$querysub = "Select * from sub where idsub=$idsub";
$resultsub = $database -> query( $querysub );
$sub = $resultsub -> fetch_assoc();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $sub['namesub']; ?></title>
    <link rel="stylesheet" href="../style_general/header.css">
    <link rel="stylesheet" href="../style_general/sidebar.css">
    <link rel="stylesheet" href="styles/Subs.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
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
            <a href="../Con-Ins/connexion.php" id="connexion">Connexion</a>
            <a href="../Compte/profile.php" id="compte">Compte</a>
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30"
                       placeholder="Rechercher">
            </div>
        </nav>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <a href="../Accueil/Index.php">Accueil</a>
    <a href="Main.php">Forum</a>
    <a href="../Compte/profile.php">Compte</a>
    <a href="../Con-Ins/connexion.php">Connexion</a>
</div>

<div class="body">
    <div class="Posts">
        <?php
        $query = "Select * from posts where idsub=$idsub";
        $result = $database -> query( $query );
        while ($posts = $result -> fetch_assoc()) {
            echo '<a href="Posts.php?id=' . $posts['Idpost'] . '">' . $posts['Title'] . '</a>' . '</br>';
        }
        echo '<a href="Subs.createPost.php?Id=' . $idsub . '" id="newBtn"> <i style="font-size: 2em" class="material-icons">add_circle_outline</i></a>';

        sessioncheck();
        sessioncheckForum();
        ?>
    </div>
</div>
<script src="../style_general/script.js"></script>
</body>
</html>

