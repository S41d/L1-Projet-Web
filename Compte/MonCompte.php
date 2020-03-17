<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="styleCompte.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<?php
    $sql = new mysqli('localhost', 'root', '', 'projet');

    $id = 4;
    $query = "select * from users where Iduser = $id";

    $result = $sql->query($query) or die($sql->error);
    $row = $result->fetch_assoc();

    $query2 = "INSERT INTO users values ";

    $Nom_Prenom = $row["Nom_Prenom"];
    $Pseudo = $row["Pseudo"];
    $Email = $row["Email"];
    $Password = $row["Password"];
    $Avatar = $row["Avatar"];
    $Avatar = $row
?>

<body>
    <header>
        <div class="logo">
            <a href="../Accueil/Index.html">
                <img src="../logo.jpeg" alt="logo">
            </a>
        </div>
        <div class="nav" s>
            <nav id="nav">
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
        <label style="margin-bottom: 20px;"><?php echo $Nom_Prenom?></label>
        
        <div class="labels">
            <label class="label-left">Nom</label>
            <label class="label-right"><?php echo $Nom_Prenom?></label>
         </div>
        <div class="labels">
            <label class="label-left">Pseudo</label>
            <label  class="label-right"><?php echo $Pseudo?></label>
        </div>
        <div class="labels">
            <label class="label-left">Email</label>
            <label class="label-right"><?php echo $Email?></label>
        </div>
        <div class="labels">
            <label class="label-left">Type Compte</label>
            <label class="label-right">Payant</label>
        </div>
        <div class="labels">
            <label class="label-left">mqlkdjflq</label>
            <label class="label-right">yes</label>
        </div>

    </div>
    <script src="../Accueil/script.js"></script>
</body>

</html>