<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

require "config/conn.php";

$schema1 = getSchema($tbl_conn_1,$database1);
$schema2 = getSchema($tbl_conn_2,$database2);

include("views/view.php");