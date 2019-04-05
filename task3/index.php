<?php
include 'config.php';
include 'libs/FileObj.php';


$fileAction= new FileObj();

$printOneRow=$fileAction->printOneRow(1);//print selected Row
$printOneSym=$fileAction->printOneSymbol(0,0);//print selected Symbol
$printAllRow=$fileAction->printAllRows();//Print All Rows in the file
$printAllSym=$fileAction->printAllSymbol();// Print All Symbols in the file

$replaceSym=$fileAction->replaceOneSymbol(0, 2, 'l'); // replace selected Symbol
$replaceRow=$fileAction->replaceOneRow(1, "Hello Mykola!");//replace selected Row
$printAllSavedRow=$fileAction->printSavedAllRows();//Print All Rows in the saved file
include 'templates/indexT.php';
?>