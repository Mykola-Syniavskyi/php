<?php

class Session implements iWorkData
{   

 //-------FUNC FOR ADD DATA--------


    public function saveData($key, $value)
    {
        if (is_string($key) && is_string($value) || is_numeric($value))
        {   $key= trim($key);
            session_start();
            $_SESSION[$key]=$value;
        return true;
        }
        return false;    
    }


    //-------FUNC FOR GET DATA--------

    public function getData($key)
    {
        if (is_string($key))
        {
            $key= trim($key);
            session_start();
            return $_SESSION[$key];
        }
        return false;
    }


 //-------FUNC FOR DELETE DATA--------

    public function deleteData($key)
    {
        if (is_string($key))
        {
            $key= trim($key);
            session_start();
            unset($_SESSION[$key]);
            return "Data  was deleted from session";
        }
        return false;  
    }
}
