<?php

class Json implements iWorkData
{  
    
    

   //-------FUNC FOR ADD DATA--------

    public function saveData($key, $value)
    {
        if (is_string($key) )
        {   
            $key= trim($key);
            $value=trim($value);
            $saveData[$key]=$value; 
            file_put_contents(PATH_JSON,"\n".json_encode($saveData),JSON_FORCE_OBJECT);
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
             $fileJson=file_get_contents(PATH_JSON);
            $tempArray = json_decode($fileJson, true); 
            if ($tempArray[$key])
            {
                return $tempArray;
            }      
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
            file_put_contents(PATH_JSON,json_encode($del));
            return "Data was deleted from json  ";
        }
        return false;     
    }
}

