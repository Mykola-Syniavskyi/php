<?php
class SoupClient
{
    public $client;

    function getClient()
    {
        $url = URL;
        $options['uri'] = "http://tc.geeksforless.net/~user15/php/soup/task2/";
        $options['location'] = "http://tc.geeksforless.net/~user15/php/soup/task2/soapserver/SoapServer.php";
        $options['cache_wsdl'] =  WSDL_CACHE_NONE;
        $options['trace'] = true;
        $options['soap_version'] = SOAP_1_1;
        $client = new SoapClient("http://tc.geeksforless.net/~user15/php/soup/task2/soapserver/SoapServer.php?wsdl",$options);
        $this->client = $client;
        return $client;
    }

    function getCars()
    {
        if (is_object($this->getClient()))
        {
           $rez = $this->client->getAllCars();
           print_r($rez);
        }
    }
}