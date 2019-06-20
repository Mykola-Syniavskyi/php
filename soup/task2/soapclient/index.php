<?php
include 'SoupClient.php';

$obj = new SoupClient();
$carList=$obj->getCars();

//print_r($_POST);
$rezSearch = $obj->searchCar($_POST);




include 'templates/indexT.php';
