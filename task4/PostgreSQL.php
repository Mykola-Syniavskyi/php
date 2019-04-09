<?php
class PostgreSQL extends SQL
{
    protected $link;

    
    public function __construct()
    {   
        parent::__construct();
        $conn_string = "host= 127.0.0.1 port= 5432 dbname=user15 user=user15 password=user15";
        $this->link=pg_connect($conn_string); 
    }

//-----FUNC for SELECTION

    public function selectAll()
    {   
        if ($this->select() && $this->link) 
        {
            return $rez= pg_query($this->select());
        }
        else 
        {
            return "function selectAll() does not work".":".pg_result_error_field();
        }
    }



//-----FUNC for INSERTION

    public function insertQ()
    { 
        if ($this->link) 
        {  
            $rez= pg_query($this->insert());
            
        }
        else 
        {
            return "function insertQ() does not work".":".pg_result_error_field();
        }
    }


//-----FUNC for UPDATION

    public function updateQ()
    { 
        if ($this->link) 
        {  
            $rez= pg_query($this->update()); 
            
        }
        else 
        { 
            return "function updateQ() does not work".":".pg_result_error_field();
        }
    }
   

    //-----FUNC for DELETION

    public function deleteQ()
    {
        if ($this->link) 
        {  
            $rez= pg_query($this->delete()); 
            
        }
        else 
        { 
            return "function deleteQ() does not work".":".pg_result_error_field();
        }
    }   

}
