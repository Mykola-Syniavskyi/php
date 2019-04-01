<?php
include'config.php';
include'libs/Calculator.php';

 $obj= new Calculator();

//SUM
$Num1=$obj->SetA(5);
$Num2=$obj->SetB(5);
echo "SUM is:". $obj->Sum($Num1, $Num2); echo"<pre>";


//substract
$Num1=$obj->SetA(1);
$Num2=$obj->SetB(4);
echo "SUBSTRACTION is:". $obj->Substr($Num1, $Num2); echo"<pre>";


//Multiply
$Num1=$obj->SetA(1);
$Num2=$obj->SetB(4);
echo "Multiply is:". $obj->Multiply($Num1, $Num2);echo"<pre>";


//Divide
$Num1=$obj->SetA(150);
$Num2=$obj->SetB('werwerwer');
echo "Divide is:". $obj->Divide($Num1, $Num2);echo"<pre>";

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
