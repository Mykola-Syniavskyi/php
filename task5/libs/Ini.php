<?php

class Ini implements iWorkData
{   
   

     //-------FUNC FOR ADD DATA--------

    public function saveData($key, $value)
    {
        if (is_string($key) && is_string($value) || is_numeric($value))
        {   $key= trim($key);
            $saveData=parse_ini_file(PATH_INI);// check iniFile
            if (!count($saveData))
            {
                $saveData[$key] = $value;//if empty add data
                foreach ($saveData as $k=>$v)
                {
                    $saveStr= file_put_contents(PATH_INI, "$k=$v");
                }
            }
            else
            {
               if (array_key_exists ($key , $saveData )) // check for keys in the arr
               {
                    foreach ($saveData as $k=>$v)//if exist, rewrite
                    {
                        $saveData[$k] =$v;
                    }
               }
               else// if not exist add in the end of the file
               {
                file_put_contents(PATH_INI,"\n"."$key = $value",FILE_APPEND | LOCK_EX);
               }
            }
                return false;
         }      
    }


   //-------FUNC FOR GET DATA--------

    public function getData($key)
    {
        if (is_string($key) && parse_ini_file(PATH_INI))
        {
            $key= trim($key); 
            return $tempArray = parse_ini_file(PATH_INI);           
        }
         return false;
    }



 //-------FUNC FOR DELETE DATA--------

    public function deleteData($key)
    {
        if (is_string($key))
        {
            $key= trim($key);
            $del=$this->getData($key);
            foreach ($del as $k=>$val):
                if ($k==$key):
                    unset($del[$k]);                   
                endif;          
            endforeach;    
            file_put_contents(PATH_INI,$del );
            return "Data was deleted from ini  ";
        }
        return false;   
    }
}
