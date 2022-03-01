<?php

require ("helper.php");

$dbhost1 = "localhost";
$database1 = "mercedes-benz";
$username1 = "root";
$passwd1 = "root";

try {
    $tbl_conn_1 = new PDO("mysql:host=$dbhost1;dbname=$database1", $username1, $passwd1);
}catch (PDOException $e){
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$dbhost2 = "localhost";
$database2 = "mercedes-benz";
$username2 = "root";
$passwd2 = "root";

try {
    $tbl_conn_2 = new PDO("mysql:host=$dbhost2;dbname=$database2", $username2, $passwd2);
}catch (PDOException $e){
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

