<?php
include 'MySoup.php';
include 'config.php';
$url="http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
$obj= new MySoup();
$rez=$obj->testSoup($url);
$dataSoupWithOutParam=$rez->ListOfCountryNamesByCode();// find info with out parameters 

$arrFullSoupWithOutParam=$dataSoupWithOutParam->ListOfCountryNamesByCodeResult->tCountryCodeAndName; 

$rez1=$obj->testCurl($url);
var_dump($rez1);













include 'templates/indexT.php';