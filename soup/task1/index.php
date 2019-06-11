<?php
include 'MYSOUP.php';



$obj= new MYSOUP();
$url='http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL';
$client=$obj->getData($url);
$allData=$client->ListOfContinentsByCode();
$rez=$allData->ListOfContinentsByCodeResult->tContinent;




$obj= new MYSOUP();
$url='http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL';
$client=$obj->getData($url);
//$allData=$client->CountryName(['sCountryISOCode'=>'AF']);





include 'templates/indexT.php';