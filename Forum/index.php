<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/styleForum/forumStyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="transitionsForum.css">
    <script>window.onunload = function () {
        }</script>
    <script defer src="../node_modules/swup/dist/swup.min.js"></script>
    <script defer src="pageTransitionsEnable.js"></script>
    <script defer src="../styles/style.js"></script>
    <script defer src="searchForum.js"></script>
    <script defer src="../sessionCheck.js"></script>
    <script defer src="comments/newComment.js"></script>
    <title>Forum</title>
</head>

<body>
<header>
    <div class="logo">
        <a id="sandwitch-icon" onclick="sidebar()">
            <i class="material-icons">menu</i>
        </a>
        <a href="/Projet-Web-L1/Accueil/index.php">
            logo
        </a>
    </div>
    <div class="nav">
        <nav id="nav">
            <a href="../Con-Ins/connexion.php" class="connexionButton">Connexion</a>
            <a href="../Compte/profile.php" class="compteButton">Compte</a>
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30"
                       placeholder="Rechercher" onkeyup="searchForum()">
            </div>
        </nav>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <a href="../Accueil/index.php">Accueil</a>
    <a href="../Forum/">Forum</a>
    <a class="compteButton" href="../Compte/profile.php">Compte</a>
    <a class="connexionButton" href="../Con-Ins/connexion.php">Connexion</a>
</div>
<div class="body" id="body">
    <main id="swup" class="transition-fade-scale">
        <div class="Subs">
            <?php
            $database = new mysqli( 'localhost', 'root', '', 'projet' );
            $subquery = 'Select * From sub order by idsub desc ';
            $result = $database -> query( $subquery ) or die( 'can\'t connect to server to get subs' );
            echo '<a href="createSub.php" style="animation-delay: 0.2s" class="newBtn" id="newBtn">New Sub</a>';
            $sec = 0.3;
            while ($subname = $result -> fetch_assoc()) {
                echo '<a style="animation-delay :' . $sec . 's;" href="/Projet-Web-L1/Forum/Subs.php?idsub=' . $subname['idsub'] . '" >' . '<img src="' . $subname['photo-sub'] . '" alt="">' . $subname['namesub'] . '</a>';
                $sec += 0.1;
            }
            ?>
        </div>
    </main>
</div>

</body>

</html>


































