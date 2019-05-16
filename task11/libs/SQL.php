<?php
include ('config.php');
class SQL
{   

    protected $tableName;
    protected $tableFild;
    protected $tableValues;//for insert
    protected $updateValue;
    protected $updateFild;
    protected $condition;
    protected $limit;
    protected $query;
    protected $insertQ;
    protected $updQ;
    protected $deleteQ;
    
    public function __construct()
    {
        $this->tableName='';
        $this->tableFild=[];
        $this->tableValues=[];//for insert
        $this->updateValue='';
        $this->updateFild='';
        $this->condition='';
        $this->query='';
        $this->insertQ='';
        $this->updateQ='';
        $this->deleteQ='';
        $this->limit=''; 

    }

//---------FUNC for creating array with prohibited "*"
    private function arrayPush($var, $val)
    {
    $val = trim($val);
    if ($val != '*')
    {
        array_push($var, $val);
        return $var;
    }
    return false;
    }


//--------SETER for TableName

    public function setTableName($tName)
    {   
        $tName= trim($tName);
        if ($tName)
        {
            $this->tableName=$tName;
            return true;
        }
        return false;
    }
    

//--------SETER for TableFild

    public function setTableFild($tFild)             
    {   
        $tFild= trim($tFild); 
        if ($tFild)
        {
            $this->tableFild= $this->arrayPush($this->tableFild, $tFild); 
            return true; 
        }
        return false;
    }
     

    //--------SETER for TableValues

    public function setTableValues( $tValues)             
    {
        $tValues= trim($tValues);
        if ($tValues)
        {
            $this->tableValues= $this->arrayPush($this->tableValues, $tValues);   //print_r($this->tableValues);
            return true;
        }
        return false;
    }
    


//--------SETER for UpValue

    public function setUpValue( $upValue)            
    {
        $upValue= trim($upValue);
        if ($upValue)
        {
            $this->updateValue= $upValue;   
            return true;
        }
        return false;
    }


//--------SETER for UpFild

    public function setUpFild( $upFild)             
    {
        $upFild= trim($upFild);
        if ($upFild)
        {
            $this->updateFild= $upFild;   
            return true;
        }
        return false;
    }


//--------SETER for Condition

    public function setCondition($cond)
    {
        $cond= trim($cond);
        if ($cond)
        {
            $this->condition=$cond;
            return true;
        }
        return false;     
    }
    


//--------SETER for Limit

    public function setLimit($limit)
    {
        //$limit=1;    
        if (is_int($limit))
        {
            $this->limit=$limit;
            return true;
        }
        return false;
    }



//--------GETER for TableName

    public function getTableName()                 
    {
        if ($this->tableName)
        {
            return $this->tableName;
        }
        return false;
    }
    

//--------GETER for TableFild

    public function getTableFild()
    {
        if ($this->tableFild) 
        { 
           return $this->tableFild; 
        }
        return false;
    }


//--------GETER for TableValues

    public function getTableValues( ) 
    {
        if ($this->tableValues) 
        { 
           return $this->tableValues; 
        }
        return false;
    }



//--------GETER for UpValue

    public function getUpValue()
    {
        if ($this->updateValue)
        { 
           return $this->updateValue;
        }
        return false;
    }





//--------GETER for UpFild

    public function getUpFild()
    {
        if ($this->updateFild)
        { 
           return $this->updateFild;
        }
        return false;
    }





   //--------GETER for Condition
    
    public function getCondition()
    {
       
        if ($this->condition)
        {
            return $this->condition;
        }
        return false;     
    }



    //--------GETER for Limit

    public function getLimit()
    {
        if ($this->limit)
        {
            return $this->limit;
        }
        return false;
    }



 //-----------SELECT---- INSERT---------DELETE-------------UPDATE

//-----------SELECT
    public function select()
    {  if ($this->getTableName() && $this->getTableFild())
        {  
            $selectFilds= implode(",",$this->getTableFild()) ;     
          return $this->query="SELECT" . " ".$selectFilds. " ". "FROM". " " .$this->getTableName()." "."LIMIT"." ". $this->getLimit().";" ;          
        }
        return "ERROR  select not returned";            
    }



//-----------INSERT

    public function insert()
    {  if ($this->getTableName() &&  $this->getTableFild() && $this->getTableValues())
        {
            $insertVals = implode("','",$this->getTableValues());
            $insertFilds = implode(",",$this->getTableFild());
            //print_r("INSERT INTO"." ".$this->getTableName()." "."(". $insertFilds.")"."VALUES"."('".$insertVals."');");
            $this->insertQ="INSERT INTO"." ".$this->getTableName()." "."(". $insertFilds.")"."VALUES"."('".$insertVals."');";
            return $this->insertQ;
        }
        else
        {
            return "ERROR  insert not returned".":".mysql_error(); 
        }
          
    }





//-----------UPDATE

    public function update()
    {
        if ($this->getTableName() && $this->getUpFild() && $this->getUpValue() && $this->getCondition())
        {   
             return $this->updQ= "UPDATE"." ".$this->getTableName()." "."SET"." ".$this->getUpFild()."="."'".$this->getUpValue()."'"." "."WHERE"." ".$this->getCondition().";" ;          
        }   
        else
        { 
            return "ERROR  update not returned".":".mysql_error(); 
        } 
    }




//-----------DELETE

    public function delete()
    {
        if ($this->getTableName() && $this->getCondition())
        {
            return $this->deleteQ="DELETE  from "." ".$this->getTableName()." ". "WHERE"." ".$this->getCondition().";";
       
        }
        else
        { 
            return "ERROR  delete not returned".":".mysql_error(); 
        } 
    }

    

}

