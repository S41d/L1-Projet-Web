<?php
session_start();

$database = new mysqli('localhost', 'root', '', 'projet');
$idUser = $_SESSION['Iduser'];
$query = "Select * from users where Iduser=$idUser";
$result = $database->query($query);
$result = $result->fetch_assoc();

$data = array (
    'id' => $result['Iduser'],
    'name' => $result['Name'],
    'email' => $result['Email'],
    'accountType' => $result['accountType']
);

echo json_encode($data);
