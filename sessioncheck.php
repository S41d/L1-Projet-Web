<?php
session_start();
echo json_encode( $_SESSION, JSON_THROW_ON_ERROR, 512 );;