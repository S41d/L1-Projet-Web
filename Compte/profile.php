<?php
session_start();
$Name = $_SESSION['Name'] ?? 'null';
$Pseudo = $_SESSION['Pseudo'] ?? 'null';
$Email = $_SESSION['Email'] ?? 'null';
$Type = $_SESSION['Type'] ?? 'null';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="../style_general/header.css">
    <link rel="stylesheet" href="styleCompte.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

<header>
    <div class="logo">
        <a href="../Accueil/Index.php">
            logo
        </a>
    </div>
    <div class="nav">
        <nav id="nav">
            <a href="../Forum/Main.php">Forum</a>
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30" placeholder="Rechercher">
            </div>
        </nav>
    </div>
</header>

<div class="body">
    <img src="../logo.jpeg" alt="">
    <label style="margin-bottom: 20px; color: white"><h1><?php echo $Name ?></h1></label>

    <div class="labels">
        <label class="label-left">Nom</label>
        <label class="label-right"><?php echo $Name ?></label>
    </div>
    <div class="labels">
        <label class="label-left">Pseudo</label>
        <label class="label-right"><?php echo $Pseudo ?></label>
    </div>
    <div class="labels">
        <label class="label-left">Email</label>
        <label class="label-right"><?php echo $Email ?></label>
    </div>
    <div class="labels">
        <label class="label-left">Type Compte</label>
        <label class="label-right"><?php echo $Type ?></label>
    </div>
    <div class="labels" id="logout">
        <a href="logout.php">logout</a>
    </div>
</div>

<script src="../style_general/script.js"></script>
</body>

</html>