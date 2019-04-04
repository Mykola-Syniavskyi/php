<?php
include 'config.php';
include 'functions.php';


$noticeError= '';
$noticeSucc= '';
$noticeDel= '';
$noticePerm="";

//upload file
if (isset($_POST['submite'])) 
{	
	$rezUpload = uploadFile(DIR_PATH);
	
}

//delete file
if (isset($_POST['delFile'])) 
{
	$rezDelete=deleteFile($_POST['fileName'], DIR_PATH);	
}

//show files table 
$arrFiles = showTable(DIR_PATH);


include 'templates/indexT.php'
?>











