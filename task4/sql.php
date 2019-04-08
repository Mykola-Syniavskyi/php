<?php
include ('config.php');
class SQL
{   

    protected $tableName;
    protected $tableFild;
    protected $tableValues;
    protected $updateValues;
    protected $condition;
    protected $limit;
    protected $query;
    protected $insertQ;
    
    
    public function __construct()
    {
        $this->tableName='';
        $this->tableFild=[];
        $this->tableValues=[];
        $this->updateValues=[];
        $this->condition='';
        $this->query='';
        $this->insertQ='';

        $this->limit=1;  
    }



    public function setTableName($tName)
    {   
        $tName= trim($tName);
        if($tName)
        {
            $this->tableName=$tName;//print_r($this->tableName);
            return true;
        }
        return false;
    }
    
    public function setTableFild( $tFild)             // SETER FUNCTIONS
    {
        $tFild= trim($tFild);
        if($tFild)
        {
            $this->tableFild= $this->arrayPush($this->tableFild, $tFild);   
            return $this->tableFild; 
        }
        return false;
    }
     


    public function setTableValues( $tValues)             // SETER FUNCTIONS
    {
        $tValues= trim($tValues);
        if($tValues)
        {
            $this->tableValues= $this->arrayPush($this->tableValues, $tValues);   //print_r($this->tableValues);
            return true;
        }
        return false;
    }
    

    public function setUpValues( $upValues)             // SETER FUNCTIONS
    {
        $upValues= trim($upValues);
        if($upValues)
        {
            $this->updateValues= $this->arrayPush($this->updateValues, $upValues);   //print_r($this->tableValues);
            return true;
        }
        return false;
    }



    public function setCondition($cond)
    {
        $cond= trim($cond);
        if($cond)
        {
            $this->condition=$cond;
            return true;
        }
        return false;     
    }
    
    public function setLimit($limit)
    {
        $limit=1;    
        if($this->limit=1)
        {
            return true;
        }
        return false;
    }




    public function getTableName()                   //GETER FUNCTIONS
    {
        if($this->tableName)
        {
            return $this->tableName;
        }
        return false;
    }
    
    public function getTableFild()
    {
        if($this->tableFild) 
        { 
           return $this->tableFild; 
        }
        return false;
    }

    public function getTableValues()
    {
        if($this->tableValues)
        { 
           return $this->tableValues;
        }
        return false;
    }



    public function getUpdateValues()
    {
        if($this->updateValues)
        { 
           return $this->updateValues;
        }
        return false;
    }
    


    
    
    public function getCondition()
    {
       
        if($this->condition)
        {
            return $this->condition;
        }
        return false;     
    }
    
    public function getLimit()
    {
        if($this->limit)
        {
            return $this->limit;
        }
        return false;
    }



                                         //SELECT     INSERT     DELETE     UPDATE


    public function select()
    {  if($this->getTableName() && $this->getTableFild())
        {            
          return $this->query="SELECT" . " ".$this->arrToStr($this->getTableFild()). " ". "FROM". " " .$this->getTableName().";" ;          
        }
        return "ERROR  select not returned";            
    }




    


    public function insert()
    {  if($this->getTableName() &&  $this->getTableFild() && $this->getTableValues())
        {print_r($this->insertQ);
             $this->insertQ="INSERT INTO"." ".$this->getTableName()." "."(".$this->arrToStr($this->getTableFild()).")"."VALUES"."(".$this->strQuote($this->arrToStr($this->getTableValues())).");";

        }
        return "ERROR  insert not returned";   
    }

    //" " . "WHERE"." " .$this->getCondition(). " " . "Limit"." " .$this->getLimit().
    


    public function update()
    {
        $sql="UPDATE"." ".$this->getTableName()." "."SET"." ".$this->getTableFild()==$this->getUpdateValues()." "."WHERE"." ".$this->getCondition().";";
        return $this->sql;
    }








    public function delete()
    {
        $sql="DELETE  from "." ".$this->getTableName()." ". "WHERE"." ".$this->getCondition().";";
        return $this->sql;
    }
   
    
    private function arrToStr($arr)
    {
        if($arr)
        {
            $rez=trim(implode(",", $arr), ',');
            return $rez;
        }return false;
    }


    private function strQuote($quote)
    {
        if($quote)
        {
            $rez="'".$quote."'";
            return $rez;
        }return false;
    }


    private function arrayPush($var, $val)
  {
    $val = trim($val);
    if ($val != '*')
    {
      array_push($var, $val);return $var;
    }
    return false;
  }

}

?>