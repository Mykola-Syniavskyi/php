<?php
include ('MYSQL.php');

//DATA FOR SELECT

$combine= new MYSQL;

 $combine->setTableFild('FirstName');
 $combine->setTableFild('LastName');
 $combine->setTableName('students');
 $combine->setLimit(10);
 $combine->conectToBase();
 


//INSERT 

$combine->setTableValues('Elena');
$combine->setTableValues('Syniavskaia');
$combine->conectToBase();
$insert=$combine->insertQ();



// UPDATE

$combine->setUpValue('Olena');
$combine->setUpFild('FirstName');
$combine->setCondition("LastName= 'Syniavskaia'");
$update=$combine->updateQ();



// DELETE :  IF you want to delete last changes please uncoment CALL to DELL_FUNCTION

//$delete=$combine->deleteQ();


//SELECT
$select=$combine->selectAll();

include ('template/indexT.php');
