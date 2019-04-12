<?php
include 'config.php';
include 'libs/iInstrument.php';
include 'libs/Instrument.php';
include 'libs/iBand.php';
include 'libs/Band.php';
include 'libs/iMusician.php';
include 'libs/Musician.php';



$instr1=new Instrument();
$instr1->setName('Gitar');
$instr1->setCategory('String');

$instr2=new Instrument();
$instr2->setName('Drum');
$instr2->setCategory('striked');

$instr3=new Instrument();
$instr3->setName('Flute');
$instr3->setCategory('organ');



$musician1= new Musician();
$musician1->addInstrument($instr3);






$objBand= new Band();






 ;
// $insrName=$objInstr->getName();
// $insrCateg=$objInstr->getCategory();

$objMusic= new Musician();
$addInstr=$objMusic->addInstrument();



include 'templates/indexT.php';
