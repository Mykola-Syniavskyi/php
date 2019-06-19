<?php
ini_set("soap.wsdl_cache_enabled", "0");

include('Cars.php');

// $server = new SoapServer("http://tc.geeksforless.net/~user15/php/soup/task2/soapserver/cars.wsdl");
$server = new SoapServer("http://mysite.local/soap/task2/soapserver/cars.wsdl");
$obj= new Cars();
echo " <pre>";
print_r($obj->getAllCars());
echo " <pre>";
 
 print_r($obj->getOneCar(1));
 print_r($obj->getCarsByParams(array('model'=>'tt','year'=>'2012','brand'=>'audi','max_speed'=>200,'engine_capacity'=>2, 'color'=>'white', 'price'=>200000)));

$server->setClass("Cars");
$server->handle();