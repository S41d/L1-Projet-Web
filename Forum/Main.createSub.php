<?php
include '../sessioncheck.php';
session_start();
$modId = '';
if (isset( $_SESSION['Iduser'] )) {
    $modId = $_SESSION['Iduser'];
}
else {
    echo '<script></script>';
}

if (isset( $_POST['nameSub'], $_POST['descriptionSub'], $_POST['submit'] )) {
    $directory = __DIR__ . '/photosSubs/';
    $photoDirectory = $directory . basename( $_FILES['uploadPhotoInput']['name'] );
    $photo = '';
    if ($_FILES['uploadPhotoInput']['name'] === '') {
        $photo = null;
        echo 'null';
    }
    else {
        $photo = './photosSubs/' . $_FILES['uploadPhotoInput']['name'];
        echo $photo;
    }

    $subName = $_POST['nameSub'];
    $subDescription = $_POST['descriptionSub'];
    $database = new mysqli( 'localhost', 'root', '', 'projet' );
    $newSubQuery = "Insert into sub(namesub, description, `photo-sub`, modid) value ('$subName', '$subDescription', '$photo', $modId)";
    $resultSubQuery = $database -> query( $newSubQuery ) or die( 'query failed : ' . mysqli_error( $database ) );
    if ($resultSubQuery) {
        move_uploaded_file( $_FILES['uploadPhotoInput']['tmp_name'], $photoDirectory );
        $idSub = $database -> insert_id;
        $goBack = 'Location: ./Subs.php?idsub=' . $idSub;
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/styleForum/createNew.css">
    <title>Créer un nouveau sub</title>
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

<div class="body">
    <form action="Main.createSub.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <label for="nameSub"> Nom
            <input type="text" name="nameSub">
        </label>
        <label for="descriptionSub"> Description
            <textarea name="descriptionSub" cols="30" rows="10"></textarea>
        </label>
        <label for="uploadPhotoInput" id="uploadPhotoSub">
            <input type="file" name="uploadPhotoInput" id="uploadPhotoInput">
            Browse photo
        </label>
        <button type="submit" name="submit">Créer sub</button>
    </form>
</div>

<?php sessioncheck(); ?>
<script src="../styles/style.js"></script>
<script src="../styles/styleForum/photoBrowseBtn.js"></script>
<script src="search.js"></script>
</body>
</html>