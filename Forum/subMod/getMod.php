<?php
session_start();

$database = new mysqli('localhost', 'root', '', 'projet');
$idSub = $_GET['idSub'] ;
$query = "Select * from sub where idsub=$idSub";
$result = $database->query($query);
$result = $result->fetch_assoc();

$data = $result['modid'];

echo json_encode($data);
