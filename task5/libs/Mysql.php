<?php
include 'config.php';
class Mysql implements iWorkData
{   
    private $link;

    public  function __construct()
        {
            $this->$link = mysqli_connect(HOST, USER, PASSWD, DB_NAME);

            if (!$this->$link) {
                echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
                echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }

            return $this->link;
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
