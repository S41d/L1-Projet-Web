<?php
session_start();
include '../sessioncheck.php';

$postid = $_GET['id'];
$database = new mysqli( 'localhost', 'root', '', 'projet' );
$postquery = "Select * from posts where Idpost = $postid ";
$commentsQuery = "Select comments.* from comments, commentpost where commentpost.idcomment = comments.idcomment and commentpost.Idpost = $postid order by dateComment DESC ";
$resultpost = $database -> query( $postquery ) or die( 'can\'t connect to server to get posts' );
$resultcomments = $database -> query( $commentsQuery ) or die( 'can\'t connect to server to get comments' );
$post = $resultpost -> fetch_assoc();
?> <!-- Post -->

<?php
if (isset( $_POST['submit'] )) {
    //comments Table
    $commentBody = $_POST['newComment'];
    $nameAuthor = $_SESSION['Name'];

    $newCommentQuery = "Insert into comments(commentBody, author) value ('$commentBody', '$nameAuthor')";
    $resultNewComment = $database -> query( $newCommentQuery );

    //commentpost Table
    $getCommentIdQuery = 'Select count(*) from comments c';
    $fetchCommentsCount = $database -> query( $getCommentIdQuery );
    $fetchCommentsCount = $fetchCommentsCount -> fetch_all();
    $idComment = $fetchCommentsCount[0][0] + 1;

    $newComPostQuery = "Insert into commentpost(Idpost, idcomment) value ($postid, $idComment)";
    $resultNewComPost = $database -> query( $newComPostQuery );

    if ($resultNewComment && $resultNewComPost) {
        $refreshPage = 'Location: Posts.php?id=' . $postid;
        header( $refreshPage );
    }
}
?> <!-- New Comment -->

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="../styles/styleForum/forumStyle.css">
    <title><?php echo $post['Title'] ?></title>
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
    <?php
    echo '<div class="Title">' . $post['Title'] . '<date>' . $post['Date'] . '</date>' . '</div>';
    echo '<div class="post"> <p>' . $post['Body'] . '</p> <img src="' . $post['Photo'] . '" alt="">' . '</div>';
    echo '<div class="comments">';
    echo '<div class="newComment" id="newComment"> 
        <form action="Posts.php?id=' . $postid . '" method="post">
            <textarea name="newComment" id="newComment" placeholder="Content"> </textarea>
            <div>
            <button type="submit" name="submit">Post Comment</button>
            </div>
        </form>
    </div>';
    while ($comment = $resultcomments -> fetch_assoc()) {
        echo '<div class="commentHolder">';
        $dateComment = $comment['dateComment'];
        echo '<div class="commentHead">' . $comment['author'] . ' <date>' . $dateComment . '</date> ' . '</div>';
        echo '<div class="commentBody">' . $comment['commentBody'] . '</div>';
        echo '</div>'; // commentHolder
    }
    echo '</div>'; // comments
    sessioncheck();
    sessionCheckPost();
    ?>
</div>

<script src="../styles/style.js"></script>
<script src="search.js"></script>
</body>
</html>


