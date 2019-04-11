<?php

class Cookie implements iWorkData
{   
    public function saveData($key, $value)
    {
        if (is_string($key) && is_string($value) || is_numeric($value))
        {   
            $key= trim('$key');
             setcookie('$key',$value, time()+3600);
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function getData($key)
    {
        if (is_string('$key'))
        {
            $key= trim('$key'); 
            return $cook=$_COOKIE[$key];
        }
        else
        {
            return false;
        }
    }

    public function deleteData($key)
    {
        if (is_string($key))
        {
            $key= trim($key);
            $cookDel=setcookie($key,$value, time()-3600); //print_r($cookDel);
            return "Cookie was deleted  ";
        }
        else
        {
            return false;
        }
        
    }
}
