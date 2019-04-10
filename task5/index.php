<?php
include 'config.php';
include 'libs/iWorkData.php';
include 'func.php';
include 'libs/Session.php';
include 'libs/Cookie.php';
include 'libs/Mysql.php';

$obgSes= new Session(); //var_dump($obgSes);
$addSES=add( $obgSes, 'keySes', 'ValueSes');
// $addSES=$obgSes->saveData('keySes','ValueSes');
// $getSES=$obgSes->getData('keySes');
// $delSES=$obgSes->deleteData('keySes');


$obgCook= new Cookie();
$addCook=$obgCook->saveData('keyCook','ValueCook');
$getCook=$obgCook->getData('keyCook');
$delCook=$obgCook->deleteData('keyCook');



 $objMysql= new Mysql();
// //$objMysql->conToBase();








include 'template/indexT.php';

