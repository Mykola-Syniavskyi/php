<?php
include ('MYSQL.php');
include ('PostgreSQL.php');

//---------------MYSQL--------------

//parameters for SELECT

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







//------POSTGRESQL------


$combinePg= new PostgreSQL;

//parameters FOR SELECT
$combinePg->setTableFild('FirstName');
$combinePg->setTableFild('LastName');
$combinePg->setTableName('students');
$combinePg->setLimit(10);


//----INSERT----
$combinePg->setTableValues('Elena');
$combinePg->setTableValues('Syniavskaia');
$insertPg=$combinePg->insertQ();


// UPDATE

$combinePg->setUpValue('Olena');
$combinePg->setUpFild('FirstName');
$combinePg->setCondition("LastName= 'Syniavskaia'");
$updatePg=$combinePg->updateQ();


 // DELETE :  IF you want to delete last changes please uncoment CALL to DELL_FUNCTION

 //$deletePg=$combinePg->deleteQ();

//---FUNCTION FOR SELECTION is folowing after all operations
$selectPg=$combinePg->selectAll();

include ('template/indexT.php');
