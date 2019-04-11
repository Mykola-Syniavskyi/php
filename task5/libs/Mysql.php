<?php
include 'config.php';
class Mysql implements iWorkData
{   
    private $link;



    public  function __construct()
    {
        $this->link = mysql_connect(HOST, USER, PASSWD); 
        if (!$this->link) 
        {
            die('Ошибка соединения: ' . mysql_error());
        }
        $selDB=mysql_select_db(DB_NAME);
                
    }


    public  function __destruct()
    {
            mysql_close($this->link);
    }


        //-------FUNC FOR ADD DATA--------

    public function saveData($key, $value)
    {
        if (is_string($key) && is_string($value) || is_numeric($value))
        {   
            $key= trim($key);
            $query="INSERT INTO task5 (cars, country)VALUES('$key', '$value')";
             $rez= mysql_query($query);
             if (!$rez) 
             {
                 die('Неверный запрос: ' . mysql_error());
             }
             return true;
        }
        
    }



      //-------FUNC FOR GET DATA--------

    public function getData($key)
    {
        if (is_string($key))
        {
            $key= trim($key);
            $query="SELECT cars, country FROM task5 WHERE cars='$key'"; 
            $rez= mysql_query($query);
            if (!$rez) {
                die('Неверный запрос: ' . mysql_error());
            }
            return $rez;
        }
        return false;
    }



//-------FUNC FOR DELETE DATA--------

    public function deleteData($key)
    {
        if (is_string($key))
        {
            $key= trim($key);
            $query="DELETE FROM task5 WHERE cars='$key'"; 
            $rez= mysql_query($query);//print_r($rez);
            if (!$rez) {
                die('Неверный запрос: ' . mysql_error());
            }
            return "Data was deleted  ";
        }   
    }
}
