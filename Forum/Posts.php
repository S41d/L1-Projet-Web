<?php
session_start();

$postid = $_GET['id'];
$database = new mysqli('localhost', 'root', '', 'projet');
$postquery = "Select * from posts where Idpost = $postid ";
$commentsQuery = "Select comments.* from comments, commentpost 
                where commentpost.idcomment = comments.idcomment and commentpost.Idpost = $postid 
                order by dateComment DESC ";
$commentCountQuery = "
                    Select count(commentpost.Idcomment) from posts, commentpost 
                    where posts.Idpost=commentpost.Idpost and posts.Idpost=$postid
                    ";
$resultCommentCountQuery = $database->query($commentCountQuery) or die('can\'t get comment count');
$resultCommentCountQuery = $resultCommentCountQuery->fetch_assoc();
$resultpost = $database->query($postquery) or die('can\'t connect to server to get posts');
$resultcomments = $database->query($commentsQuery);
$post = $resultpost->fetch_assoc();
?> <!-- Post -->

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/hearder-sidebar.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="../styles/styleForum/forumStyle.css">
    <script defer src="../styles/style.js"></script>
    <script defer src="search/searchForum.js"></script>
    <script defer src="../sessionCheck.js"></script>
    <script defer src="comments/newComment.js"></script>
    <script defer src="subMod/deletePost.js"></script>
    <title><?php echo $post['Title'] ?></title>
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
            <a class="connexionButton" href="../Con-Ins/connexion.php" id="connexion">Connexion</a>
            <a class="compteButton" href="../Compte/profile.php" id="compte">Compte</a>
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
    <?php
    echo '<div class="Title">' . $post['Title'] . '<date>' . $post['Date'] . '</date>' . '</div>';
    echo '<div class="post">'
        . '<p>' . $post['Body'] . '</p>'
        . '<img src="' . $post['Photo'] . '" alt="">'
        . '</div>';  // post
    echo '<div class="commentCount">' . $resultCommentCountQuery['count(commentpost.Idcomment)'] . ' commentaires </div>';
    echo '<div class="comments">';
    echo '<div class="newComment" id="newComment"> 
            <textarea name="newComment" id="newCommentText" placeholder="Content"> </textarea>
            <div>
                <button id="submit">Post Comment</button>
            </div>
        </div>';
    echo '<div id="commentsHolder">';
    $delai = 0.7;
    while ($comment = $resultcomments->fetch_assoc()) {
        echo '<div style="animation-delay: ' . $delai . 's" class="commentHolder">';
        $dateComment = $comment['dateComment'];
        echo '<div class="commentHead">' . $comment['author'] . ' <date>' . $dateComment . '</date> ' . '</div>';
        echo '<div class="commentBody">' . $comment['commentBody'] . '</div>';
        echo '</div>'; // commentHolder
        $delai += 0.1;
    }
    echo '</div>'; // comments
    echo '</div>'; //commentSHolder
    ?>
</div>

</body>
</html>


