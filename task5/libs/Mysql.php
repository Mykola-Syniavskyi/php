<?php
include 'config.php';
class Mysql implements iWorkData
{   
    private $link;

    public  function __construct()
        {
                           $this->link = mysql_connect('localhost', 'user15', 'user15'); 
                if (!$this->link) {
                    die('Ошибка соединения: ' . mysql_error());
                }
                echo 'Успешно соединились';
                $selDB=mysql_select_db('user15');//print_r($selDB);
                mysql_close($this->link);
        }



        



    public function saveData($key, $value)
    {
        if (is_string($key) && is_string($value) || is_numeric($value))
        {   $key= trim($key);
            
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
            
            return "Data was deleted  ";
        }
        else
        {
            return false;
        }

     
        
    }
}
