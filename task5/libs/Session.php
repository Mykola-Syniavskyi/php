<?php

class Session implements iWorkData
{   
    public function saveData($key, $value)
    {
        if (is_string($key) && is_string($value) || is_numeric($value))
        {   $key= trim($key);
            session_start();
            $_SESSION['$key']=$value;
        return true;
        }
        else
        {
            return false;
        }
        
    }

    public function getData($key)
    {
        if (is_string($key))
        {
            $key= trim($key);
            session_start();
            return $_SESSION['$key'];
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
            session_start();
            unset($_SESSION['$key']);
            return "Data  was deleted from session";
        }
        else
        {
            return false;
        }
        
    }
}
