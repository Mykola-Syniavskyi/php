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
$Num2=$obj->SetB(10);
echo "Divide is:". $obj->Divide($Num1, $Num2);echo"<pre>";

// //Devide by one
$Num2=$obj->SetB(5);
echo "Divide by one is:". $obj->DevideByOne( $Num2);echo"<pre>";

//Square Radical
$Num1=$obj->SetA(6);
echo "Radical is:". $obj->SqrRoot($Num1);echo"<pre>";

//Persent
$Num1=$obj->SetA(20);
$Num2=$obj->SetB(1000);
echo "Persent is:". $obj->percent($Num1, $Num2);echo"<pre>";

//Operatios with memory
$Num1=$obj->SetA(10);
echo "Save to memory is:". $obj->mSave($Num1);echo"<pre>";// Save to memory
echo "Read from memory is:".$obj->mRead();echo"<pre>";// Read from memory
echo "Add number to nomber in mem is:".$obj->mPlus();echo"<pre>";// Add number to nomber in mem
$Num1=$obj->SetA(5);
echo "substract number from nomber in mem:".$obj->mMinus();echo"<pre>";//substract number from nomber in mem
echo "Clear memory is:".$obj->mClear();echo"<pre>";// Clear memory
?>
