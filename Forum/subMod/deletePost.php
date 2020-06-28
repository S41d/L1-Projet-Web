<?php
$database = new mysqli('localhost', 'root', '', 'projet');
$idPost = $_GET['idPost'];
$idSub = $_GET['idSub'];
$queryComments = "
                DELETE comments, commentpost
                FROM comments
                INNER JOIN commentpost on comments.Idcomment = commentpost.idcomment
                WHERE Idpost=$idPost;
                ";
$queryPost = "Delete from posts where Idpost=$idPost;";

$database->query($queryComments) or mysqli_error($database);
$database->query($queryPost) or mysqli_error($database);
header("Location: ../Subs.php?idsub=$idSub");