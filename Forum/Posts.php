<?php
session_start();
include '../sessioncheck.php';

$postid = $_GET['id'];
$database = new mysqli( 'localhost', 'root', '', 'projet' );
$postquery = "Select * from posts where Idpost = $postid ";
$commentsQuery = "Select comments.* from comments, commentpost where commentpost.idcomment = comments.idcomment and commentpost.Idpost = $postid";
$resultpost = $database -> query( $postquery ) or die( 'can\'t connect to server to get posts' );
$resultcomments = $database -> query( $commentsQuery ) or die( 'can\'t connect to server to get comments' );
$post = $resultpost -> fetch_assoc();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $post['Title'] ?></title>
    <link rel="stylesheet" href="../style_general/header.css">
    <link rel="stylesheet" href="../style_general/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="styles/Posts.css">
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
    <?php
    echo '<div class="Title">' . $post['Title'] . '<date>' . $post['Date'] . '</date>' . '</div>';
    echo '<div class="post"> <p>' . $post['Body'] . '</p> <img src="' . $post['Photo'] . '" alt="">' . '</div>';
    echo '<div class="comments">';
    while ($comment = $resultcomments -> fetch_assoc()) {
        echo '<div class="commentHolder">';
        echo '<div class="commentHead">' . $comment['Author'] . ' <date>' . $comment['dateComment'] . '</date> ' . '</div>';
        echo '<div class="commentBody">' . $comment['commentBody'] . '</div>';
        echo '</div>'; // commentHolder
    }
    echo '</div>'; // comments
    sessioncheck();
    ?>
</div>

<script src="../style_general/script.js"></script>
</body>
</html>


