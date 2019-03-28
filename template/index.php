<?php
include ('config.php');
if (isset($_POST))
{
    print_r($_POST);
}

$combine= new SQL;
if($combine)
{ $combine->con();
  $combine->SetName();
  $combine->SetFild_1();
  //$combine->SetFild_1();
  $combine->SetFild_2();
  $combine->insert();

   
  //print_r($combine->con());
 // echo  $combine->select();
}

