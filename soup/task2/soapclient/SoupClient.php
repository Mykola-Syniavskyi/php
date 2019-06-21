<?php
include '../soapserver/config.php';
class SoupClient
{
    public $client;
    public $errors = array();

  

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
        if (count($params) && is_object($this->getClient()))
        {  if  ($params['year'])
            {
                $rez = $this->client->getCarsByParams($params); //print_r($rez);
                if (empty($rez))
                {
                    return $this->errors = CAR;
                }
                else
                {
                    return $rez;
                }
                
            }
            else
            { 
              return $this->errors = YEAR;
               //print_r($this->errors);
            }
            
        }
       

    }

    function buyCar($params, $id)
    { 
        if (is_array($params) && is_object($this->getClient()))
        {
            $params['id'] = $id['id'];
       // print_r($params);
           
        
        $rez = $this->client->addOrder($params); //print_r($rez);
        return $rez;
        }
        
        

    }
}