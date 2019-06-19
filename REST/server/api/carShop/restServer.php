<?php
class restServer
{
    protected $url;
    protected $method;
    protected $params;

    public function parsUrl()
    {
       if  ($_SERVER['REQUEST_URI'])
       {
           $arrMethod= array();
           $arrParams= array();
           $this->url= $_SERVER['REQUEST_URI']; echo '<pre>';
            $arrRez = explode('/',$this->method= substr($this->url, 37));
            foreach ($arrRez as $key=>$val)
            {
                if ($key==0)
                {
                    array_push($arrMethod, $val); 
                    $this->method = $arrMethod;
                }
                if ($key==1)
                {
                     array_push($arrParams, $val);
                     $this->params = $arrParams;

                }

            
                print_r($this->params);
            }print_r($arrMethod);

       }
    }

    

}