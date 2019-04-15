<?php
include 'config.php';
include 'libs/iInstrument.php';
include 'libs/Instrument.php';
include 'libs/iBand.php';
include 'libs/Band.php';
include 'libs/iMusician.php';
include 'libs/Musician.php';



$instr1=new Instrument();
$instr1->setName('Guitar');
$instr1->setCategory('String');

$instr2=new Instrument();
$instr2->setName('Drum');
$instr2->setCategory('striked');

$instr3=new Instrument();
$instr3->setName('Flute');
$instr3->setCategory('organ');



$musician1= new Musician();
$musician1->setMusician('guitar player');
$musician1->addInstrument($instr1);

$musician2= new Musician();
$musician2->setMusician('drummer');
$musician2->addInstrument($instr2);

$musician3= new Musician();
$musician3->setMusician('flutist');
$musician3->addInstrument($instr3);



 $band1= new Band();
 $band1->setName('Abba');
 $band1->setGenre('PopMusic');
 $musician1->assingToBand($band1);
 $musician2->assingToBand($band1);
 $musician3->assingToBand($band1);
 


 $bandName=$band1->getName();
 $bandGenre=$band1->getGenre();
 $getMusician=$band1->getMusician();


// $getMusician1=$band1->getMusician();
// $Musician2=$band1->addMusician($musician2);
// $getMusician2=$band1->getMusician();
// $Musician3=$band1->addMusician($musician3);
// $getMusician3=$band1->getMusician();
// $arrayBand1=['name'=>$bandName, 'genre'=>$bandGenre, 'musician1'=>$getMusician1, 'musician2'=>$getMusician2, 'musician3'=>$getMusician3,];








include 'templates/indexT.php';
