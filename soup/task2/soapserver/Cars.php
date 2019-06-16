<?php
include 'config.php'
class Cars 
{
    private $autoCatalog;
    private $link;
    


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





    function show()
    {
        print_r($this->autoCatalog);
    }

    function allAuto()
    {
        $resultArray = array();

        foreach($this->con->query('SELECT Cars.id, CarsModel.name, model 
        from Cars,CarsModel 
        where id_name = CarsModel.id') as $row) {
            $tmp_arr = array('id'=>$row['id'],'model'=>$row['model'],'name'=>$row['name']);
            array_push($resultArray, $tmp_arr); 
        }
       
        return $resultArray;
    }

    function oneAuto($id)
    {
        $resultArray = array();
       
        $stmt = $this->con->prepare("SELECT Cars.id, CarsModel.name, model , year , engin , color, max_speed, price
        FROM Cars,CarsModel WHERE id_name = CarsModel.id  
        AND Cars.id = ?");
        $stmt->execute([$id]); 
        $row = $stmt->fetch();

            $tmp_arr = array(
            'id'=>$row['id'],    
            'modelName'=>$row['name'].":".$row['model'],
            'year'=>$row['year'],
            'engine'=>$row['engin'],
            'color'=>$row['color'],
            'maxspeed'=>$row['max_speed'],
            'price'=>$row['price']);
            array_push($resultArray, $tmp_arr); 
        
        return $resultArray;
    }

    function searchAuto()
    {
        $val = 'BMW';
        $searchParam = 'Name';

        $arr = array();

        $arr = array();

        foreach($this->con->query('SELECT Cars.id, CarsModel.name, model 
        from Cars,CarsModel 
        where id_name = CarsModel.id') as $row) {
            $tmp_arr = array('id'=>$row['id'],'model'=>$row['model'],'name'=>$row['name']);
            array_push($arr, $tmp_arr); 
        }
       
        return $arr;

        foreach ($this->autoCatalog as $item){
            if($item[$searchParam] == $val){
                $tmp_arr = array(
                    'modelName'=>$item['Name'].":".$item['Model'],
                    'year'=>$item['Year'],
                    'engine'=>$item['Engine'],
                    'color'=>$item['Color'],
                    'maxspeed'=>$item['MaxSpeed'],
                    'price'=>$item['Price']
                );
                array_push($arr, $tmp_arr);    
            }
        }
        return $arr;
    }

}