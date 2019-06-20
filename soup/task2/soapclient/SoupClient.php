<?php
class SoupClient
{
    public $client;


    public function __construct()
    {  
         $this->placeholders=
         [
             '%ERROR_YEAR%'=>'',
                     
             ];		
    }



    function getClient()
    {
        $url = URL;
        // $options['uri'] = "http://tc.geeksforless.net/~user15/php/soup/task2/";
        $options['uri'] = "http://mysite.local/soap/task2/";
        // $options['location'] = "http://tc.geeksforless.net/~user15/php/soup/task2/soapserver/SoapServer.php";
        $options['location'] = "http://mysite.local/soap/task2/soapserver/SoapServer.php";
        $options['cache_wsdl'] =  WSDL_CACHE_NONE;
        $options['trace'] = true;
        $options['soap_version'] = SOAP_1_1;
        $client = new SoapClient("http://mysite.local/soap/task2/soapserver/SoapServer.php?wsdl",$options);
        // $client = new SoapClient("http://tc.geeksforless.net/~user15/php/soup/task2/soapserver/SoapServer.php?wsdl",$options);
        $this->client = $client;
        return $client;
    }

    function getCars()
    {
        if (is_object($this->getClient()))
        {
           $rez = $this->client->getAllCars();
           return $rez;
        }
    }



    function getCar($id)
    {
        if ($id && is_object($this->getClient()))
        {
            $id=(int)htmlspecialchars($id); 
            $rez = $this->client->getOneCar($id); 
            return $rez;
        } 
    }


    function searchCar($params)
    {
        if ($params && is_object($this->getClient()))
        {print_r($params);
            $rez = $this->client->getOneCar($params); print_r($rez);
            return $rez;
        }

    }
}