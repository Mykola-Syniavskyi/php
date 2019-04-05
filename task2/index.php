<?php
include'config.php';
include'libs/Calculator.php';

 $obj= new Calculator();

//SUM
$Num1=$obj->SetA(5);
$Num2=$obj->SetB(3);
$sum= "SUM is:". $obj->Sum($Num1, $Num2); echo"<pre>";


//substract
$Num1=$obj->SetA(1);
$Num2=$obj->SetB(4);
$substract= "SUBSTRACTION is:". $obj->Substr($Num1, $Num2);


//Multiply
$Num1=$obj->SetA(1);
$Num2=$obj->SetB(4);
$multiply= "Multiply is:". $obj->Multiply($Num1, $Num2);


//Divide
$Num1=$obj->SetA(150);
$Num2=$obj->SetB(10);
$divide= "Divide is:". $obj->Divide($Num1, $Num2);
// //Devide by one
$Num2=$obj->SetB(5);
$divByOne= "Divide by one is:". $obj->DevideByOne( $Num2);

//Square Radical
$Num1=$obj->SetA(9);
$radical= "Radical is:". $obj->SqrRoot($Num1);

//Persent
$Num1=$obj->SetA(20);
$Num2=$obj->SetB(1000);
$persent= "Persent is:". $obj->percent($Num1, $Num2);

// //Operatios with memory
$Num1=$obj->SetA(10);
$mSave= "Save to memory is:". $obj->mSave($Num1);// Save to memory
$mRead= "Read from memory is:".$obj->mRead();// Read from memory
$mPlus= "Add number to nomber in mem is:".$obj->mPlus();// Add number to nomber in mem
$Num1=$obj->SetA(5);
$mMinus="substract number from nomber in mem:".$obj->mMinus();//substract number from nomber in mem
$mClear="Clear memory is:".$obj->mClear();// Clear memory



include 'templates/indexT.php';
?>