<?php
include 'config.php';
include 'libs/FileObj.php';


$fileAction= new FileObj();
//$fileAction->checkFiles(PATH_FILE);
//$fileAction->checkNumSym();
//$fileAction->checkNumStr(0);


//$printRow=$fileAction->readOneRow(1, PATH_FILE);
//$printSym=$fileAction->readOneSymbol(0,0,PATH_FILE);
$replaceSym=$fileAction->replaceOneSymbol(0, 5, 'o');
include 'templates/indexT.php';
?>
