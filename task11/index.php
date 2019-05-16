<?php
include ('libs/MYSQL.php');
include ('libs/MY_TEST.php');




 MY_TEST::initSQLConnection();
 $delete= MY_TEST::delete(31); 


//   $title = 'car';
//   $price = '100';
//   $description = 'muscle car ';

//   $newTest = MY_TEST::newEmptyInstance();
//  $newTest->setTitle($title);
//  $newTest->setDescription($description);
//  $newTest->setPrice($price);
//  $newTest->save();
 




$newTest2= MY_TEST::find(56); 
$newTest2->setTitle('Robots');
$newTest2->setDescription('The best robot');
$newTest2->save();

$findAll=  MY_TEST::findAll(); 

//// for total action

// foreach ($findAll as $row=>$r)
// {
//    $r->setTitle('test ' . $row);
//    $r->save();
// }









include ('template/indexT.php');
