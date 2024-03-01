<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "login2";
$port = "3368";


$conn = new mysqli($host, $user, $pass, $db_name, $port);

if (!$conn) {
    
    echo "connection faild!";
}