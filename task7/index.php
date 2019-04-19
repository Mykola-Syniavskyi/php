<?php
include ('config.php');
include ('libs/Controller.php');
include ('libs/View.php');
include ('libs/Model.php');
try
{
    $objContr = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}

 


