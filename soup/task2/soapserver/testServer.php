<?php
include 'SoapServer.php';
 
ini_set("soap.wsdl_cache_enabled", "0");



$obj= new Cars();
//print_r($obj->getCarsByParams(array('model'=>'tt','year'=>'2012','brand'=>'audi','max_speed'=>200,'engine_capacity'=>2, 'color'=>'white', 'price'=>200000)));