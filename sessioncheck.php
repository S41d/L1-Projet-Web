<?php
function sessioncheck()
{
    if (isset($_SESSION['Iduser'], $_SESSION['Pseudo'])) {
        echo
        "</br> <script>
    function connexion() {
        let con = document.getElementById('connexion');
        con.style.display = \"none\";
    }
    connexion();
    </script>";
    } else {
        echo
        "</br> <script>
    function compte () {
        let con = document.getElementById('compte');
        con.style.display = \"none\";
    }
    compte();
    </script>";
    }
}
