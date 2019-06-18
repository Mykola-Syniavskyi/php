<?php
ini_set("soap.wsdl_cache_enabled", "0");

include('Cars.php');

$server = new SoapServer("http://tc.geeksforless.net/~user15/php/soup/task2/soapserver/cars.wsdl");
$obj= new Cars();
// print_r($obj->getAllCars());


$server->setClass("Cars");
$server->handle();