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
        
        if ($this->link) 
        {
            $sel_db= mysql_select_db(DB_NAME, $this->link);
            mysql_select_db(DB_NAME, $this->link ) or die ($rez="problem with select DB!".DB_NAME. ":".mysql_error());
            return   $sel_db; 
        }
        else
        {
            return  false;
        }
    }





    public function selectAll()
    {   //print_r($this->select());
        if ($this->select() && $this->conectToBase()) 
        {
            return $rez= mysql_query($this->select());
        }
        else 
        {
            return "function selectAll() does not work".":".mysql_error();
        }
    }





    public function insertQ()
    {  //print_r($this->insert());
        if ($this->link) 
        {  
            $rez= mysql_query($this->insert());
            
        }
        else 
        {
            return "function insertQ() does not work".":".mysql_error();
        }
    }



    public function updateQ()
    { //print_r($this->update());
        if ($this->link) 
        {  
            $rez= mysql_query($this->update()); 
            
        }
        else 
        { 
            return "function updateQ() does not work".":".mysql_error();
        }
    }
   

    public function deleteQ()
    {// print_r($this->delete());

        if ($this->link) 
        {  
            $rez= mysql_query($this->delete()); 
            
        }
        else 
        { 
            return "function deleteQ() does not work".":".mysql_error();
        }
    }
   
    

}
