<?php
include ('config.php');
class SQL
{   

    protected $tableName;
    protected $tableFild_1;
    protected $tableFild_2;
    public $condition ;
    
    

    public function con()
    {
        $link=mysql_connect(LOCAL_HOST, USER_15, PASSWD ); 
       // print_r($link);
        if($link)
        {
           $sel_db= mysql_select_db(DB_NAME, $link);
           echo mysql_errno($link) . ": " . mysql_error($link). "\n";
        //    mysql_query("insert students (FirstName,LastName) VALUES ('Sergei','Kobelia')", $link);
        //     echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
        }
    }
    public function SetName()
    {
        $this->tableName=$_POST['name'];
    }
     public function SetFild_1()
     {
         $this->tableFild_1=$_POST['fild_1'];
     }
     public function SetFild_2()
     {
         $this->tableFild_2=$_POST['fild_2'];
     }
    // public function SetCond()
    // {
    //     $this->condition=$_POST['where'];
    // }

    public function insert()
    {   $link=mysql_connect(LOCAL_HOST, USER_15, PASSWD); 
        // print_r($link);
         if($link)
         {
            $sel_db= mysql_select_db(DB_NAME, $link); 
            echo mysql_errno($link) . ": " . mysql_error($link). "\n";
            $rez=mysql_query("insert $this->tableName ($this->tableFild_1) VALUES ($this->tableFild_2)", $link);
            echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
            return $rez; 
         }   
         
    }


    protected function select()
    {
        $sql="insert students (id, firstName,secondName) VALUES (2, 'Sergei','Kobelia')";
        return $this->sql;
    }
    protected function delete()
    {
        $sql="delete  from students where id=1;";
        return $this->sql;
    }
    protected function update()
    {
        $sql="UPDATE students
        SET secondName = 'Synii'
        WHERE secondName = 'Syniavskyi';";
        return $this->sql;
    }
    
}

?>