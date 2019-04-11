<?php
include 'config.php';
include 'libs/iWorkData.php';
include 'func.php';
include 'libs/Session.php';
include 'libs/Cookie.php';
include 'libs/Mysql.php';
include 'libs/Ini.php';

$objSes= new Session(); 
$addSes=add( $objSes, 'keySes', 'ValueSes');
$getSes=read($objSes, 'keySes');
$delSes=del($objSes, 'keySes');


$objCook= new Cookie();
$addCook=add($objCook,'keyCook','ValueCook');
$getCook=read($objCook,'keyCook');
$delCook=del($objCook,'keyCook');




 $objMysql= new Mysql();
 $addMysql=add( $objMysql, 'Audi', 'Germany');
 $getMysql=read( $objMysql, 'Audi');
 $delMysql=del( $objMysql, 'Audi');
 

 $objIni= new Ini();
 $addIni=add( $objIni,  'Audi', 'Origin - Germany');
 $grtIni=read( $objIni,  'Audi');

 
  
 




include 'template/indexT.php';

