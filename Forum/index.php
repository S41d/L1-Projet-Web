<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles/hearder-sidebar.css">

    <link rel="stylesheet" href="../styles/styleForum/forumStyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script defer src="../sessionCheck.js"></script>
    <script defer src="../styles/style.js"></script>
    <script defer src="search/searchForum.js"></script>
    <script defer src="comments/newComment.js"></script>
    <script defer src="subMod/deletePost.js"></script>
    <title>Forum</title>
</head>

<body>
<header>
    <div class="logo">
        <a id="sandwitch-icon" onclick="sidebar()">
            <i class="material-icons">menu</i>
        </a>
        <a href="../Accueil/index.php">
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
    <div class="Subs">
        <?php
        $database = new mysqli('localhost', 'root', '', 'projet');
        $subquery = 'select *
                        from sub
                        order by namesub;
                        ';
        $result = $database->query($subquery) or die('can\'t connect to server to get subs');
        echo '<a href="createSub.php" style="animation-delay: 0.2s" class="newBtn" id="newBtn">New Sub</a>';
        $sec = 0.3;
        while ($subname = $result->fetch_assoc()) {
            echo '<a style="animation-delay :' . $sec . 's;" href="./Subs.php?idsub=' . $subname['idsub'] . '" >'
                . '<img src="' . $subname['photo-sub'] . '" alt="">' . $subname['namesub']
                . '</a>';
            $sec += 0.1;
        }
        ?>
    </div>
</div>

</body>

</html>



































