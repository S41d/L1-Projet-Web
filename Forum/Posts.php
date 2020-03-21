<?php
function showPost()
{
    $postid = $_GET['id'];
    $database = new mysqli('localhost', 'root', '', 'projet');
    $postquery = "Select * from posts where Idpost = $postid ";
    $result = $database ->query($postquery) or die('can\'t connect to server to get posts');
    while ($post = $result->fetch_assoc()){
        echo $post['Title'];
        echo '</br>';
        echo $post['Body'];
        echo '</br>';
    }
}
showPost();