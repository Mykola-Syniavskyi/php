<?php

class Ini implements iWorkData
{   

   
    public function saveData($key, $value)
    {
        if (is_string($key) && is_string($value) || is_numeric($value))
        {   $key= trim($key);

            $string= ["[".$key."]",$value]; //print_r($string) ;

            $saveIni=file_put_contents(PATH_INI, implode("\n",$string));
            $read= file_get_contents(PATH_INI); print_r($read);
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function getData($key)
    {
        if (is_string($key) && parse_ini_file(PATH_INI))
        {
            $key= trim($key); 
            $tempArray = parse_ini_file(PATH_INI); echo "1";
             print_r($this->$tempArray);
            

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
           
            return "Cookie was deleted  ";
        }
        else
        {
            return false;
        }
        
    }
}
