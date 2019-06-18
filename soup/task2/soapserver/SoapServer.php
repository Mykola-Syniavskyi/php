<?php
ini_set("soap.wsdl_cache_enabled", "0");

include('Cars.php');

$server = new SoapServer("http://mysite.local/soap/task2/soapserver/cars.wsdl");

$server->setClass("Cars");
$server->handle();