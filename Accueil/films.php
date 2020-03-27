<?php
function showFims()
{
    $database = new mysqli('localhost', 'root', '', 'projet');
    $queryfilm = 'Select `Link-Photo` From films';
    $result = $database -> query($queryfilm) or die($database -> error);
    while ($photos = $result -> fetch_assoc()) {
        $link = implode($photos);
        $id = substr($link, 9, -4) . '/g';
        echo "<a href=\"\" style=\"background-image: url($link);\" id=\"$id\" '></a>";
    }
}
