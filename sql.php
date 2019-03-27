<?php
class SQL
{   

    protected $tableName;
    protected $tableFilds;
    protected $condition;
    public $link;

    function __construct()
    {
        $this->link=mysql_connect('localhost', 'user15', 'user15' ); 
    }
    public function SetName()
    {
        $this->tableName=$_POST['name'];
    }
    public function SetFilds()
    {
        
    }
    public function SetCond()
    {
        
    }

    public function select()
    {
        $sql="select * from students;";
        return $this->sql;
    }
    protected function insert()
    {
        $sql="insert students (id, firstName,secondName) VALUES (2, 'Sergei','Kobelia') ;";
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