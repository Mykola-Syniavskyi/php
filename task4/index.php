<?php
include ('MYSQL.php');


//SELECT

$combine= new MYSQL;
$combine->setTableName('students');
// $combine->setTableFild('FirstName');
// $combine->conectToBase();
// $select=$combine->selectAll();


//INSERT 

$combine->setTableFild('FirstName');
$combine->setTableFild('LastName');
$combine->setTableValues('Elena');
$combine->setTableValues('Syniavskaia');
$combine->conectToBase();
$insert=$combine->insertQ();



include ('template/indexT.php');
?>