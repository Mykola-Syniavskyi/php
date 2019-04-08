<?php
include ('MYSQL.php');
//SELECT

$combine= new MYSQL;
$combine->setTableName('students');
 $combine->setTableFild('FirstName');
 $combine->setTableFild('LastName');
 $combine->conectToBase();
 $select=$combine->selectAll();


//INSERT 


$combine->setTableValues('Elena');
$combine->setTableValues('Syniavskaia');
$combine->conectToBase();
$insert=$combine->insertQ();
$select=$combine->selectAll();


include ('template/indexT.php');
?>