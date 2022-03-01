<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

require "conn.php";

$output1 = getSchema($tbl_conn_1,$database1);
$output2 = getSchema($tbl_conn_2,$database2);

include("view.php");

function getSchema($conn,$database){
  $output = array();

  $output['database'] = $database;

  $st1 = $conn->prepare("SHOW TABLES");
  $st1->execute();
  $tables = $st1->fetchAll(PDO::FETCH_ASSOC);
  $output['tables'] = $tables;
  foreach($tables as $table){

      $tbl = $table['Tables_in_'.$database];

      $st2 = $conn->prepare("DESCRIBE `$tbl`");
      $st2->execute();
      $columns = $st2->fetchAll(PDO::FETCH_ASSOC);

      foreach($columns as $i => $col){
          $output['tables'][$i]['columns'] = $columns;
      }

      //get foreign keys
      /*$qry = "SELECT 
        TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
      FROM
        INFORMATION_SCHEMA.KEY_COLUMN_USAGE
      WHERE
        REFERENCED_TABLE_SCHEMA = '".$database."' 
        AND REFERENCED_TABLE_NAME = '".$tbl."';";
      $st3 = $conn->prepare($qry);
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

  return $output;
}