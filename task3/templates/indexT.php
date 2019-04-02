<?php
include 'libs/FileObj.php';
include 'config.php';
$fileAction= new FileObj();
//$fileAction->checkFiles(PATH_FILE);
//$fileAction->checkNumSym();
//$fileAction->checkNumStr();
$fileAction->setRow(1, PATH_FILE);