<?php
include ('config.php');
class SQL
{   

    protected $tableName;
    protected $tableFild;
    protected $condition;
    protected $limit;
    
    
    
    public function conectToBase()
    {
        $link=mysql_connect(HOST, USER, PASSWD); 
        if($link)
        {
            $sel_db= mysql_select_db(DB_NAME, $link);
            mysql_select_db(DB_NAME, $link ) or die ($rez="problem with select DB!".DB_NAME. ":".mysql_error());
            mysql_query("set names 'utf8'");
            return $link; 
        //    mysql_query("insert students (FirstName,LastName) VALUES ('Sergei','Kobelia')", $link);
        //     echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
        }
        else
        {
            return  false;
        }
    }



    public function SetName()
    // {
    //     $this->tableName=$_POST['name'];
    // }
    //  public function SetFild_1()
    //  {
    //      $this->tableFild_1=$_POST['fild_1'];
    //  }
    //  public function SetFild_2()
    //  {
    //      $this->tableFild_2=$_POST['fild_2'];
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
            //echo mysql_errno($link) . ": " . mysql_error($link). "\n";
            //$rez=mysql_query("insert $this->tableName ($this->tableFild_1) VALUES ($this->tableFild_2)", $link);
            echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
            return $rez; 
         }   
         
    }


    public function select()

    {  
        
       if($this->conectToBase()) 
       {
            $sql="select  * from students"; 
            $arr=mysql_query($sql); 
            $row = mysql_fetch_assoc($arr) ; 
            return $row;
       }
       else
       {
            echo "ggg";
       }
       
        
    }
    public function delete()
    {
        $sql="delete  from students where id=1;";
        return $this->sql;
    }
    public function update()
    {
        $sql="UPDATE students
        SET secondName = 'Synii'
        WHERE secondName = 'Syniavskyi';";
        return $this->sql;
    }
    
}

?>