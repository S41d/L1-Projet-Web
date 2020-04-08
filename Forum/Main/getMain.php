<?php
$database = new mysqli( 'localhost', 'root', '', 'projet' );
$subquery = 'Select * From sub order by idsub desc ';
$result = $database -> query( $subquery ) or die( 'can\'t connect to server to get subs' );
$data = array();
while ($resultValues = $result -> fetch_assoc()) {
    $data[] = array(
        'idsub' => $resultValues['idsub'],
        'namesub' => $resultValues['namesub']
    );
}
echo json_encode( $data, JSON_THROW_ON_ERROR, 512 );