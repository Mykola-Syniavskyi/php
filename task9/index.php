<?php
include 'libs/HTMLhelper.php';

$classname = 'HTMLhelper';
//select-multi

$name='menu';
$size=4;
$selected='lamb';
$arr=['pork','lamb','fish','chicken'];
$style='color:red';
$select = $classname::selectMulty($name,$size,$selected,$arr,$style);

//create table
$myclass="myTable"; 
$myid="firstTable";
$myborder=1;
$mycellspacing=0;
$arrTh=['№', 'Cityes', 'ZIPCOD' ];
$arrTd=[['№'=>"1",'Cityes'=>"Mykolaiv",'ZIPCOD'=>"0512" ], ['№'=>"2",'Cityes'=>"Kyiv",'ZIPCOD'=>"044" ]];
$table=$classname::createTable($myclass, $myid, $myborder, $mycellspacing, $arrTh, $arrTd);

//create ol
$mytypeol="A";
$myclassol="myol";
$arrOl=['red','green', 'blue'];
$ol=$classname::ol($mytypeol,$myclassol,$arrOl);

//create ul
$mytypeul="square";
$myclassul="myul";
$arrul=['red','green', 'blue'];
$ul=$classname::ul($mytypeul,$myclassul,$arrul);

//create radiobuttons
$type="radio";
$check="cement";
$name="name";
$value=['wooden'=>'door','glass'=>'window','cement'=>'floor'];
$radio=$classname::createRadio($type,$check,$name,$value);

include 'templates/indexT.php';


