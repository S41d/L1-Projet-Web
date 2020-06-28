<?php
include "../../database.php";
$postid = $_GET['idPost'];


//comments Table
$commentBody = $_GET['newComment'];
$nameAuthor = $_GET['author'];

$newCommentQuery = "
                    Insert into comments(commentBody, author) 
                    value ('$commentBody', '$nameAuthor')
                    ";
$resultNewComment = $database->query($newCommentQuery);

//commentpost Table
$getCommentIdQuery = 'Select max(Idcomment) from comments';
$fetchCommentsCount = $database->query($getCommentIdQuery);
$fetchCommentsCount = $fetchCommentsCount->fetch_all();
$idComment = $fetchCommentsCount[0][0];

$newComPostQuery = "
                    Insert into commentpost(Idpost, idcomment) 
                    value ($postid, $idComment)
                    ";
$resultNewComPost = $database->query($newComPostQuery);

$commentsQuery = "Select comments.* from comments, commentpost where commentpost.idcomment = comments.idcomment and commentpost.Idpost = $postid order by dateComment DESC ";
$resultcomments = $database->query($commentsQuery);
$data = array();
while ($comment = $resultcomments->fetch_assoc()) {
    $data = array(
        'authorComment' => $comment['author'],
        'bodyComment' => $comment['commentBody'],
        'dateComment' => $comment['dateComment']
    );
}
$data = json_encode($data);
