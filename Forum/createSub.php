<?php
session_start();
$modId = $_SESSION['Iduser'];

if (isset($_POST['nameSub'], $_POST['descriptionSub'], $_POST['submit'])) {
    $directory = __DIR__ . '/photosSubs/';
    $photoDirectory = $directory . basename($_FILES['uploadPhotoInput']['name']);
    $photo = '';
    if ($_FILES['uploadPhotoInput']['name'] === '') {
        $photo = null;
        echo 'null';
    } else {
        $photo = './photosSubs/' . $_FILES['uploadPhotoInput']['name'];
        echo $photo;
    }

    $subName = $_POST['nameSub'];
    echo '<br>' . $subName;
    $subDescription = $_POST['descriptionSub'];
    echo '<br>' . $subDescription;
    echo '<br>' . $modId;
    $database = new mysqli('localhost', 'root', '', 'projet');
    $newSubQuery = "Insert into sub(namesub, description, `photo-sub`, modid) value ('$subName', '$subDescription', '$photo', $modId)";
    $resultSubQuery = $database->query($newSubQuery) or die('query failed : ' . mysqli_error($database));
    if ($resultSubQuery) {
        move_uploaded_file($_FILES['uploadPhotoInput']['tmp_name'], $photoDirectory);
        $idSub = $database->insert_id;
        $goBack = 'Location: ./Subs.php?idsub=' . $idSub;
        header($goBack); //Envoi vers le post créé
    } else {
        echo mysqli_error($database);
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
    <link rel="stylesheet" href="../styles/hearder-sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link rel="stylesheet" href="../styles/styleForum/createNew.css">
    <title>Créer un nouveau sub</title>
    <script defer src="../styles/style.js"></script>
    <script defer src="../styles/styleForum/photoBrowseBtn.js"></script>
    <script defer src="search/searchForum.js"></script>
    <script defer src="../sessionCheck.js"></script>
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
            <a class="connexionButton" href="../Con-Ins/connexion.php">Connexion</a>
            <a class=" compteButton" href="../Compte/profile.php">Compte</a>
            <div class=" search">
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

<div class="body">
    <form action="createSub.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div id="name">
            <input required type="text" name="nameSub">
            <label for="nameSub"> <span>Nom </span></label>
        </div>
        <div id="description">
            <textarea required name="descriptionSub" rows="30"></textarea>
            <label for="descriptionSub"> <span>Description</span>
            </label>
        </div>
        <div id="buttons">
            <input type="file" name="uploadPhotoInput" id="uploadPhotoInput">
            <label for="uploadPhotoInput" id="uploadPhotoSub">
                Browse photo
            </label>
            <button type="submit" name="submit">Créer sub</button>
        </div>
    </form>
</div>

</body>
</html>