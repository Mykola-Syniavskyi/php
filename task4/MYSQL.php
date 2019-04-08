<?php
include'SQL.php';
class MYSQL extends SQL
{
    protected $link;

    
    
    public function __construct()
    {   
        parent::__construct();
        $this->link=mysql_connect(HOST, USER, PASSWD); 
    }





    public function conectToBase()
    {
        
        if($this->link) 
        {
            $sel_db= mysql_select_db(DB_NAME, $this->link);//var_dump($sel_db);
            mysql_select_db(DB_NAME, $this->link ) or die ($rez="problem with select DB!".DB_NAME. ":".mysql_error()); //print_r( $sel_db);
            return   $sel_db; 
        }
        else
        {
            return  false;
        }
    }





    public function selectAll()
    {
        if($this->select() && $this->conectToBase()) //print_r($this->select());
        {
            $rez= mysql_query($this->select());// print_r($rez);
            return $rez;
        }
        else 
        {
            return "function selectAll() does not work".":".mysql_error();
        }
    }





    public function insertQ()
    { print_r($this->insert());
        if($this->link) 
        {  
            $rez= mysql_query($this->insert());// print_r($rez);
            
        }
        else 
        {
            return "function insertQ() does not work".":".mysql_error();
        }
    }
   


    

}
?>