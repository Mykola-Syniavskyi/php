<?php
include 'config.php';

// ActiveRecord

class  MY_TEST 
{
    public static function newEmptyInstance($id = null) 
    {
		return new self($id);
    }
    

// tableFilds
    protected $id;
    protected $title;
    protected $description;
    protected $price;
    protected static $_db;// MYSQL and connect




    public static function initSQLConnection() 
    {
        self::$_db = new MYSQL;
        self::$_db->conectToBase();

		$resource = mysql_connect("localhost", USER, PASSWD);
		if ($resource === false) {
			throw new Exception("Could not connect to MySQL server: " . mysql_error());
		}
		if (!mysql_select_db('user15', $resource)) {
			throw new Exception("Could not use database 'user15': " . mysql_error());
		}
	}







    private function __construct($id = null)
     {
        if (is_int($id)) 
        {
            $this->id=$id;
            return true;
        }
        
        return false;
    }

    


    //    GETERS
    
    public function getId()
    {
        return $this->id;
    }




    public function getTitle()
    {   
        return $this->title;              
    }




    public function getDescription()
    {      
        return $this->description;              
    }




    

    public function getPrice()
    {
        return $this->price;
    }





    public static function find($id)
    {    
        self::$_db->setTableName('my_test'); 
        $table=self::$_db->getTableName(); //print_r($a);
        $find= "select * from $table WHERE id = $id";  //print_r($find);
        $rez=mysql_query($find); //print_r($rez);
        while ($row = mysql_fetch_assoc($rez)) {
            $findAll= self:: newEmptyInstance((int)$row['id']);
            $findAll->setTitle($row['title']);
            $findAll->setDescription($row['description']);
            $findAll->setPrice($row['price']);
        return $findAll;
        }
    }




    // **********SHOW ALL DATA FROM BASE

    public static function findAll()
    {
        self::$_db->setTableName('my_test');
        self::$_db->setTableFild('id');
        self::$_db->setTableFild('title');
        self::$_db->setTableFild('description');
        self::$_db->setTableFild('price');
        self::$_db->setLimit(40);
        $findAll=self::$_db->selectAll();
    $arr=array();
    $index=0; 
    $arrObj=array();
        while($REZ= mysql_fetch_assoc($findAll)){
            $index++;
            $arr[$index]=$REZ;
            $arr=$arr[$index];

            $row = $REZ;

            $obj= self:: newEmptyInstance((int)$row['id']);
            $obj->setTitle($row['title']);
            $obj->setDescription($row['description']);
            $obj->setPrice($row['price']);
            array_push($arrObj, $obj);// create array of objects
        }   
        return  $arrObj; 
    }




    

    public function save()
    { 
        
        if (isset($this->id))
        {
            $this->update();
        }
        else
        {
            $this->insert();
        }
    }




    protected function update() 
    {
        self::$_db->setTableName('my_test');

        self::$_db->setUpValue($this->price);
        self::$_db->setUpFild('price');
        self::$_db->setCondition("id= $this->id");
        self::$_db->updateQ();

        self::$_db->setUpValue($this->title);
        self::$_db->setUpFild('title');
        self::$_db->setCondition("id= $this->id");
        self::$_db->updateQ();

        self::$_db->setUpValue($this->description);
        self::$_db->setUpFild('description');
        self::$_db->setCondition("id= $this->id");
        self::$_db->updateQ();
    }



    
    protected function insert() 
    {   
        
        self::$_db->setTableFild('title');
        self::$_db->setTableFild('price');
        self::$_db->setTableFild('description');
        self::$_db->setTableName('my_test');
        self::$_db->setTableValues($this->title); //print_r($this->title);
        self::$_db->setTableValues($this->price);
        self::$_db->setTableValues($this->description);
        self::$_db->insertQ();

        $new_id = mysql_insert_id();
        $this->id = $new_id;
    }




    public static function delete($aId) {
        $lId = (int) $aId;
        if ($lId < 0 || $lId > PHP_INT_MAX) {
            return false;
        }
        self::$_db->setTableName('my_test');
        self::$_db->setCondition("id = $lId");
        self::$_db->deleteQ();
        
    }







    public function __call($name, $arguments)
    {   
        if(count($arguments) != 1) return;
        foreach ($arguments as $arg)
        {
            $var = $arg; 
        }   
            if ($var && $name)
            {
                $name= strtolower(substr($name, 3)); 
                $this->{$name}= trim($var);    
                return true;
            }
            else
            {
               return false;
            }
        
    }

  
}

