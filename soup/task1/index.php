<?php
include 'MySoup.php';
include 'config.php';
$url="http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
$obj= new MySoup();
$rez=$obj->testSoup($url);
$dataSoupWithOutParam=$rez->ListOfCountryNamesByCode();// find info without parameters 
$arrFullSoupWithOutParam=$dataSoupWithOutParam->ListOfCountryNamesByCodeResult->tCountryCodeAndName; 

//SOUP with params in the template

$rez1=$obj->testCurl($url);
$finalRezArr=$rez1['mListOfCountryNamesByCodeResponse']['mListOfCountryNamesByCodeResult']['mtCountryCodeAndName'];

//CURL with params in the template











include 'templates/indexT.php';