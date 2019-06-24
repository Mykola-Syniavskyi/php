<?php
include 'restServer.php';
class Cars extends restServer
{
    
    

    public function getInfo()
    {
    //   $method= $_SERVER['REQUEST_METHOD'];
    //   $body = getFormData($method);
    //   print_r($body);
        // echo $_SERVER['REQUEST_URI'];
    }
}











$obj = new Cars();
$obj->parsUrl();
// $obj->setMethod('Test', "Vasia");
$obj->getMethod();
