<?php
class PostgreSQL extends SQL
{
    protected $link;
    
    public function __construct()
    {   
        parent::__construct();
        $dsn="pgsql: host=".HOST.";dbname=".DB_NAME;
        $options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]; 
       

        try {
            $this->link=new PDO($dsn, USER, PASSWD,$options); 
        } catch (PDOException $e) {
            return $e->getMessage();
        } 

    }
   
    

    public function toStringSelect()
     {  
         //print_r($this->select.$this->selectDistinct.$this->from.$this->join.$this->leftJoin.$this->rightJoin.$this->crossJoin.$this->naturalJoin.$this->where.$this->group.$this->having.$this->order.$this->limit );
        $stmt=$this->link->prepare( $this->select.$this->selectDistinct.$this->from.$this->join.$this->leftJoin.$this->rightJoin.$this->crossJoin.$this->naturalJoin.$this->where.$this->group.$this->having.$this->order.$this->limit);
        if ($this->where)
        {
            $stmt->bindParam(':params',$this->params);// for where
        }      
        $stmt->execute();
        $rez= $stmt;
        return $rez;
        
    }




    public function toStringUpdate()
    { 
        //print_r($this->update.$this->where);
        $stmt=$this->link->prepare( $this->update.$this->where);
        $stmt->bindParam(':params',$this->params);// for where
        foreach ($this->updateValues as $key => $val)
        {
            $stmt->bindParam($key, $this->updateValues[$key]);
        }
        $stmt->execute();
    }



    public function toStringDelete()
    { 
        //print_r($this->delete.$this->where);
        $stmt=$this->link->prepare( $this->delete.$this->where);
        $stmt->bindParam(':params',$this->params);// for where
        $stmt->execute();
    }

   



    public function insert($table, $columns)
    {         
        parent::insert($table, $columns);
        $stmt=$this->link->prepare($this->insert);//print_r($stmt);
        foreach ($this->insertValue as $key=>$val)
        {
            $stmt->bindParam($key, $this->insertValue[$key]); 
        }
        //check for existing inputet columns name in base
        $getCulumnName = $this->link->prepare("select * from $table limit 1"); 
        $getCulumnName->execute();
        $fields = array_keys($getCulumnName->fetch(PDO::FETCH_ASSOC));
        $inputKeys= array_keys($columns);

        foreach ($inputKeys as $key)
        {
            if (in_array(strtolower($key), $fields)) //check input filds for existing
            { 
                $stmt->execute();
                return $this;
            }return false;
        }
    }




    public function select($columns)
    {         
            parent::select($columns);
            return $this;
    }





    public function selectDistinct($columns)
    {
        parent::selectDistinct($columns);         
        return $this;  
    }





    public function from($tables)
    {      
        parent:: from($tables);
        return $this;      
    }



    public function where($condition, $params)
    {
        parent:: where($condition, $params);
        return $this;   
    }



    public function having($havingCondition, $havingParams)
    {
        parent:: having($havingCondition, $havingParams);
        return $this;   
    }



    public function order($columns)
    {
        parent:: order($columns);
        return $this;
    }




    public function group($columns)
    {
        parent:: group($columns);
        return $this;
    }




    public function limit($limit)
    {
        parent::limit($limit);
        return $this; 
    }
    



    public function join($table, $conditions)
    {
        parent::join($table, $conditions);
        return $this;
    }



    public function leftJoin($table, $conditions)
    {
        parent::leftJoin($table, $conditions);
        return $this;
    }


    public function rightJoin($table, $conditions)
    {
        parent::rightJoin($table, $conditions);
        return $this;
    }


    public function crossJoin($table)
    {
        parent::crossJoin($table);
        return $this;
    }

    public function naturalJoin($table)
    {
        parent::naturalJoin($table);
        return $this;
    }

    
    public function update($table, $columns)
    {
        parent::update($table, $columns);
        return $this;
    }


    public function delete($table)
    {
        parent::delete($table);
        return $this;
    }

}
