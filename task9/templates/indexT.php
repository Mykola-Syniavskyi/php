<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML helper</title>
</head>
<body>
<?php
include 'libs/HTMLhelper.php';
$classname = 'HTMLhelper';
//select-multi
$action="index.php";
$name='menu';
$size='4';
$select="selected";
$arr=['pork','lamb','fish','chicken'];
echo $classname::selectMulty($name,$size,$select,$arr,$action)."<br>";


//create table

$myclass="myTable"; 
$myid="firstTable";
$myborder="1";
$mycellspacing="0";
$arrTh=['№', 'Cityes', 'ZIPCOD' ];
$arrTd=[['№'=>"1",'Cityes'=>"Mykolaiv",'ZIPCOD'=>"0512" ], ['№'=>"2",'Cityes'=>"Kyiv",'ZIPCOD'=>"044" ]];
echo $classname::createTable($myclass, $myid, $myborder, $mycellspacing, $arrTh, $arrTd);

?>
</body>
</html>




