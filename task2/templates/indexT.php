<?php
include'config.php';
include'libs/Calculator.php';

 $obj= new Calculator();

//SUM
$Num1=$obj->SetA(22);
$Num2=$obj->SetB(2);
$obj->Sum($Num1, $Num2);

//substract
$Num1=$obj->SetA(1);
$Num2=$obj->SetB(4);
$obj->Substr($Num1, $Num2);


//Multiply
$Num1=$obj->SetA(1);
$Num2=$obj->SetB(4);
$obj->Multiply($Num1, $Num2);


//Divide
$Num1=$obj->SetA(10);
$Num2=$obj->SetB(100);
$obj->Divide($Num1, $Num2);

// //Devide by one
$Num2=$obj->SetB(2);
$obj->DevideByOne( $Num2);

//Square Radical
$Num1=$obj->SetA(625);
$obj->SqrRoot($Num1);

//Persent
$Num1=$obj->SetA(10);
$Num2=$obj->SetB(100);
$obj->percent($Num1, $Num2);

//Operatios with memory
$Num1=$obj->SetA(10);
$obj->mSave($Num1);// Save to memory
$obj->mRead();// Read from memory
$obj->mPlus();// Add number to nomber in mem
$Num1=$obj->SetA(5);
$obj->mMinus();//substract number from nomber in mem
$obj->mClear();// Clear memory
?>
