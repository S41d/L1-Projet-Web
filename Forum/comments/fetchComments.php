<?php
$postid = $_GET['id'];
$database = new mysqli('localhost', 'root', '', 'projet');
$commentsQuery = "Select comments.* from comments, commentpost where commentpost.idcomment = comments.idcomment and commentpost.Idpost = $postid order by dateComment DESC ";
$resultcomments = $database->query($commentsQuery);
$delai = 0.1;

$comment = $resultcomments->fetch_assoc();
echo '<div style="animation: newComment 0.5s forwards;animation-delay: ' . $delai . 's" class="commentHolder">';
$dateComment = $comment['dateComment'];
echo '<div class="commentHead">' . $comment['author'] . ' <date>' . $dateComment . '</date> ' . '</div>';
echo '<div class="commentBody">' . $comment['commentBody'] . '</div>';
echo '</div>'; // commentHolder

$delai += 0.1;
while ($comment = $resultcomments->fetch_assoc()) {
    echo '<div style="animation-delay: ' . $delai . 's" class="commentHolder">';
    $dateComment = $comment['dateComment'];
    echo '<div class="commentHead">' . $comment['author'] . ' <date>' . $dateComment . '</date> ' . '</div>';
    echo '<div class="commentBody">' . $comment['commentBody'] . '</div>';
    echo '</div>'; // commentHolder
    $delai += 0.1;
}