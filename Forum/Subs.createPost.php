<?php
include '../sessioncheck.php';
session_start();
$authorId = '';
if (isset( $_SESSION['Iduser'] )) {
    $authorId = $_SESSION['Iduser'];
}
else {
    echo '<script></script>';
}

$idSub = $_GET['Id'] ?? $_POST['idSub'];

if (isset( $_POST['title'], $_POST['text'], $_POST['submit'] )) {
    $directory = __DIR__ . '/photosPosts/';
    $photoDirectory = $directory . basename( $_FILES['uploadPhotoInput']['name'] );
    $photo = '';
    if ($_FILES['uploadPhotoInput']['name'] === '') {
        $photo = null;
        echo 'null';
    }
    else {
        $photo = './photosPosts/' . $_FILES['uploadPhotoInput']['name'];
        echo $photo;
    }

    $postTitle = $_POST['title'];
    $postText = $_POST['text'];

    $database = new mysqli( 'localhost', 'root', '', 'projet' );

    $newPostQuery = "Insert into posts(idsub, Autorpost, Title, Body, Photo) value ($idSub, $authorId , '$postTitle', '$postText', '$photo')";
    $resultPostQuery = $database -> query( $newPostQuery ) or die( 'query failed : ' . mysqli_error( $database ) );

    if ($resultPostQuery) {
        move_uploaded_file( $_FILES['uploadPhotoInput']['tmp_name'],
            $photoDirectory ); //copie le fichier dans le dossier local
        $idPost = $database -> insert_id;
        $goBack = 'Location: ./Posts.php?id=' . $idPost;
        header( $goBack ); //Envoi vers le post créé
    }
    else {
        echo mysqli_error( $database );
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/styleForum/createNew.css">
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
                       placeholder="Rechercher">
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

<div class="body">
    <form action="Subs.createPost.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <label> Titre
            <input type="text" name="title" autofocus>
        </label>
        <label> Texte
            <textarea name="text" cols="30" rows="10"></textarea>
        </label>
        <label for="uploadPhotoInput" id="uploadPhotoSub">
            <input type="file" name="uploadPhotoInput" id="uploadPhotoInput">
            Browse photo
        </label>
        <input style="display: none;" type="text" name="idSub" value="<?php echo $idSub ?>">
        <button type="submit" name="submit">Poster</button>
    </form>
</div>

<?php sessioncheck();
sessioncheckForum(); ?>

<script src="../styles/style.js"></script>
<script src="../styles/styleForum/photoBrowseBtn.js"></script>
</body>
</html>