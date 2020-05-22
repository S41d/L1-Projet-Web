<?php
$url = parse_url(getenv("mysql://ba2844e0c5130f:98538e2c@eu-cdbr-west-03.cleardb.net/heroku_36e83706e46bdc4?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$database = new mysqli($server, $username, $password, $db);