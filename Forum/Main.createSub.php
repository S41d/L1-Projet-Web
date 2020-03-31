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

if (isset( $_POST['name'], $_POST['description'] )) {
    $photoDir = __DIR__ . '/photosSubs/';
    $photo = $photoDir . basename( $_FILES['uploadPhotoInput']['name'] );
    echo $photo;
    if (move_uploaded_file( $_FILES['uploadPhotoInput']['tmp_name'], $photo )) {
        echo 'succesful';
    }


//    $subName = $_POST['name'];
//    $subDescription = $_POST['description'];
//    $database = new mysqli( 'localhost', 'root', '', 'projet' );
//    $newSubQuery = "Insert into sub(namesub, description, `photo-sub`, modid) value ('$subName', '$subDescription', null, $modId)";
//    $resultSubQuery = $database -> query( $newSubQuery ) or die( 'query failed : ' . mysqli_error( $database ) );
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="../style_general/sidebar.css">
    <link rel="stylesheet" href="styles/Main.createSub.css">
    <title>Créer un nouveau sub</title>
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
    <a href="../Forum/Main.php">Forum</a>
    <a href="../Compte/profile.php">Compte</a>
    <a href="../Con-Ins/connexion.php">Connexion</a>
</div>

<div class="body">
    <form action="Main.createSub.php" method="post" enctype="multipart/form-data">
        <label for="name"> Nom
            <input type="text" name="name">
        </label>
        <label for="description"> Description
            <textarea name="description" cols="30" rows="10"></textarea>
        </label>
        <label for="uploadPhotoInput" id="uploadPhoto">
            <input type="file" name="uploadPhotoInput" id="uploadPhotoInput">
            Browse photo
        </label>
        <button type="submit">Créer sub</button>
    </form>
</div>

<?php sessioncheck(); ?>
<script src="../style_general/script.js"></script>
</body>
</html>