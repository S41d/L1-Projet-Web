<?php
include '../sessioncheck.php';
session_start();
$modId = '';
if (isset( $_SESSION['Iduser'] )) {
    $modId = $_SESSION['Iduser'];
}
else {
    echo 'blyat';
    echo '<script></script>';
}

$idSub = $_GET['Id'] ?? $_POST['idSub'];

if (isset( $_POST['title'], $_POST['text'] )) {
    $postTitle = $_POST['title'];
    $postText = $_POST['text'];

    $database = new mysqli( 'localhost', 'root', '', 'projet' );

    $getAuthorQuery = "Select * from users u where u.Iduser = $modId";
    $resultauthorQuery = $database -> query( $getAuthorQuery );
    $author = $resultauthorQuery -> fetch_assoc();
    $authorId = $author['Iduser'];

    $date = date( 'd-m-Y' );

    $newPostQuery = "Insert into posts(idsub, Autorpost, Title, Body, Photo, Date) value ($idSub, $authorId , '$postTitle', '$postText', null, '$date' )";
    $resultPostQuery = $database -> query( $newPostQuery ) or die( 'query failed : ' . mysqli_error( $database ) );
    if ($resultauthorQuery) {
        echo mysqli_error( $database );
    }
}
else {
    echo 'not everything is set';
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style_general/header.css">
    <link rel="stylesheet" href="../style_general/sidebar.css">
    <link rel="stylesheet" href="styles/Subs.creatPost.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Nouveau Poste</title>
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
    <form action="Subs.createPost.php" method="post">
        <label> Titre
            <input type="text" name="title">
        </label>
        <label> Texte
            <textarea name="text" cols="30" rows="10"></textarea>
        </label>
        <input style="display: none;" type="text" name="idSub" value="<?php echo $idSub ?>">
        <button type="submit">Poster</button>
    </form>
</div>

<?php sessioncheck();
sessioncheckForum(); ?>

<script src="../style_general/script.js"></script>
</body>
</html>