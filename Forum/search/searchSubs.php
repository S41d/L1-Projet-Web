<?php
include "../../database.php";
$searchInput = $_GET['input'];
$query = "Select * from sub s where s.namesub like '%$searchInput%'";
$result = $database->query($query) or die(mysqli_error($database));
$data = array();
if (!empty($searchInput)) {
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        $data[] = array(
            'idSub' => $row[0],
            'nameSub' => $row[1],
            'descriptionSub' => $row[2]
        );
    }
    try {
        echo json_encode($data, JSON_THROW_ON_ERROR, 512);
    } catch (JsonException $e) {
        echo "json exception";
    }
}