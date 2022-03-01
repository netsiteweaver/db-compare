<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

require "conn.php";

$output = array();

$output['database'] = $database1;

$st1 = $tbl_conn_1->prepare("SHOW TABLES");
$st1->execute();
$tables = $st1->fetchAll(PDO::FETCH_ASSOC);
$output['tables'] = $tables;
// debug($tables);
foreach($tables as $table){
    // echo "<table border='1' cellspacing='0' cellpadding='10' style='width:100%; max-width:800px; font-size:14px; font-family: Arial, sane-serif; margin-bottom:10px;'>";

    $tbl = $table['Tables_in_'.$database1];
    // echo "<tr><th colspan='6'>Table: $tbl</th></tr>";

    $st2 = $tbl_conn_1->prepare("DESCRIBE `$tbl`");
    $st2->execute();
    $columns = $st2->fetchAll(PDO::FETCH_ASSOC);

    // echo "<tr><th>FIELD</th><th>TYPE</th><th>NULL</th><th>KEY</th><th>DEFAULT</th><th>EXTRA</th></tr>";
    foreach($columns as $i => $col){
        $output['tables'][$i]['columns'] = $columns;
        // echo "<tr>";
        // echo "<td>".$col['Field']."</td>";
        // echo "<td>".$col['Type']."</td>";
        // echo "<td>".$col['Null']."</td>";
        // echo "<td>".$col['Key']."</td>";
        // echo "<td>".$col['Default']."</td>";
        // echo "<td>".$col['Extra']."</td>";
        // echo "</tr>";
    }
    // echo "</table>";

    //get foreign keys
    /*$qry = "SELECT 
      TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
    FROM
      INFORMATION_SCHEMA.KEY_COLUMN_USAGE
    WHERE
      REFERENCED_TABLE_SCHEMA = '".$database1."' 
      AND REFERENCED_TABLE_NAME = '".$tbl."';";
    $st3 = $tbl_conn_1->prepare($qry);
    $st3->execute();
    $fks = $st3->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($fks)){
        // echo "<table border='1' cellspacing='0' cellpadding='10' style='width:100%; max-width:800px; font-size:14px; font-family: Arial, sane-serif; margin-bottom:10px;'>";
        // echo "<tr><th>TABLE_NAME</th><th>COLUMN_NAME</th><th>CONSTRAINT_NAME</th><!--<th>REFERENCED_TABLE_NAME</th>--><th>REFERENCED_COLUMN_NAME</th></tr>";
        foreach($fks as $j => $fk){
            $output['tables'][$i]['fks'][$j] = $fks;
            // echo "<tr>";
            // echo "<td>".$fk['TABLE_NAME']."</td>";
            // echo "<td>".$fk['COLUMN_NAME']."</td>";
            // echo "<td>".$fk['CONSTRAINT_NAME']."</td>";
            // // echo "<td>".$fk['REFERENCED_TABLE_NAME']."</td>";
            // echo "<td>".$fk['REFERENCED_COLUMN_NAME']."</td>";
            // echo "</tr>";
        }
        // echo "</table>";
    }*/

    // echo "<br style='margin-bottom:50px;'>";
}
include("view.php");