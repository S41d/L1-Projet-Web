<?php
function sessioncheck() {
    if (isset( $_SESSION['Iduser'], $_SESSION['Pseudo'] )) {
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

function sessioncheckForum() {
    if (!isset( $_SESSION['Iduser'] )) {
        echo "<br> <script>
        let newBtn = document.getElementById('newBtn');
        newBtn.style.display=\"none\";
        </script>";
    }
}

function sessionCheckPost() {
    if (!isset( $_SESSION['Iduser'] )) {
        echo "<br> <script >
        let newCommentInput = document.getElementById('newComment')
        newCommentInput.style.display=\"none\";
        </script>";
    }
}