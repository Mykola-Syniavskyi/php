<?php
include'config.php';
include'libs/Calculator.php';

 $obj= new Calculator();

//SUM
$Num1=$obj->SetA(3);
$Num2=$obj->SetB(2);
$sum= "SUM is:". $obj->Sum(); echo"<pre>";


//substract
$objsub= new Calculator();
$Num1=$objsub->SetA(5);
$Num2=$objsub->SetB(6);

$substract= "SUBSTRACTION is:". $objsub->Substr();



//Multiply
$objMult= new Calculator();
$Num1=$objMult->SetA(2);
$Num2=$objMult->SetB(4);
$multiply= "Multiply is:". $objMult->Multiply();


//Divide
$objDiv= new Calculator();
$Num1=$objDiv->SetA(150);
$Num2=$objDiv->SetB(20);
$divide= "Divide is:". $objDiv->Divide();
// //Devide by one
$objDivOne= new Calculator();
$Num2=$objDivOne->SetB(0);
$divByOne= "Divide by one is:". $objDivOne->DevideByOne( );

//Square Radical
$objRad= new Calculator();
$Num1=$objRad->SetA(2);
$radical= "Radical is:". $objRad->SqrRoot();

//Persent
$objPersent= new Calculator();
$Num1=$objPersent->SetA(20);
$Num2=$objPersent->SetB(1000);
$persent= "Persent is:". $objPersent->percent();

// //Operatios with memory
$Num1=$obj->SetA(5);
$mSave= "Save to memory is:". $obj->mSave();// Save to memory

$mRead= "Read from memory is:".$obj->mRead();// Read from memory

$mPlus= "Add number to nomber in mem is:".$obj->mPlus();// Add number to nomber in mem

$Num1=$obj->SetA(5);
$mMinus="substract number from nomber in mem:".$obj->mMinus();//substract number from nomber in mem

$mClear="Clear memory is:".$obj->mClear();// Clear memory



include 'templates/indexT.php';
?>