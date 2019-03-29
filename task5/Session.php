<?php
//include 'iWorkData.php';

class Session 
{   
    function __construct()
    {
        session_start();
    }





    public function add($data)
    {
        $_SESSION['test']=$data;
        if($_SESSION['test']=$data)
        return true;
    }

    public function read()
    {
        
        echo  $_SESSION['test'];
    }

    public function del()
    {
        unset($_SESSION['test']);
        echo  $_SESSION['test']."it is !";
    }
}
?>