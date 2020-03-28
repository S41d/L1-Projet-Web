<?php
function sessioncheck()
{
    if (isset($_SESSION['Iduser'], $_SESSION['Pseudo'])) {
        echo
        "</br> <script>
        let con = document.getElementById('connexion');
        con.style.display = \"none\"; <!-- connexion -->
    </script>";
    }
    else {
        echo
        "</br> <script>
        let compte = document.getElementById('compte');
        compte.style.display = \"none\"; <!-- Compte -->
    </script>";
    }
}
