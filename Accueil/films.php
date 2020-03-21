<?php
function showFims()
{
    $database = new mysqli('localhost', 'root', '', 'projet');
    $queryfilm = 'Select `Link-Photo` From films';
    $result = $database->query($queryfilm) or die($database->error);
    while ($photos = $result->fetch_assoc()) {
        $link = implode($photos);
        echo "<a href=\"\" style=\"background-image: url($link) ;\"></a>";
    }
}