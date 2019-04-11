<?php

class Cookie implements iWorkData
{  
    
    //-------FUNC FOR ADD DATA--------

    public function saveData($key, $value)
    {
        if (is_string($key) && is_string($value) || is_numeric($value))
        {   
            $key= trim('$key');
             setcookie('$key',$value, time()+3600);
            return true;
        }
         return false;      
    }



    //-------FUNC FOR GET DATA--------

    public function getData($key)
    {
        if (is_string('$key'))
        {
            $key= trim('$key'); 
            return $cook=$_COOKIE[$key];
        }
         return false;
    }


    //-------FUNC FOR DELETE DATA--------

    public function deleteData($key)
    {
        if (is_string($key))
        {
            $key= trim($key);
            $cookDel=setcookie($key,$value, time()-3600); 
            return "Cookie was deleted  ";
        }
         return false;    
    }
}
