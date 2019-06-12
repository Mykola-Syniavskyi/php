<?php
include 'MySoup.php';
include 'config.php';
$url="http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
$obj= new MySoup();
$rez=$obj->testSoup($url);
$dataSoupWithOutParam=$rez->ListOfCountryNamesByCode();// find info with out parameters 

$arrFullSoupWithOutParam=$dataSoupWithOutParam->ListOfCountryNamesByCodeResult->tCountryCodeAndName; 

$rez1=$obj->testCurl($url);
//$finalRezArr=$rez1->mListOfCountryNamesByCodeResponse->mListOfCountryNamesByCodeResult;
//$finalRezArr=(string)$rez1->soapBody->ListOfCountryNamesByCodeResult;
$finalRezArr=$rez1['mListOfCountryNamesByCodeResponse']['mListOfCountryNamesByCodeResult']['mtCountryCodeAndName'];













include 'templates/indexT.php';