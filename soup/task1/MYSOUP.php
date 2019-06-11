<?php
class MYSOUP
{
    public $url;
    public $client;



    public function getData($url)
    {
        $client = new SoapClient($url);
        return $client;
    }
}