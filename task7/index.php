<?php
include ('config.php');
include ('libs/Controller.php');
include ('libs/Validator.php');
include ('libs/View.php');
include ('libs/Model.php');
try
{
  $obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}

if($_POST)
{
    print_r($_POST);
}

$objVal= new Validator();
if ($_POST['email'])
$email= $_POST['email'];
$objVal->validEmail($email);
if($_POST['name'])
$name=$_POST['name'];
$objVal->ValidName($name);
if($_POST['text'])
$text=$_POST['text'];
echo $text;
$objVal->ValidText($text);




