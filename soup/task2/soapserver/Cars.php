<?php
include 'config.php';
class Cars 
{
    private $autoCatalog;
    


    function getAllCars()
    { 
        $resultArray = array();
        $dbh = new PDO(DSN, USER, PASSWD);
        foreach($dbh->query("select cars.id, brand.brand, model.model  from cars join brand on cars.id=brand.id join   model on cars.id=model.id") as $row) 
        {
            $tmp_array = array('id'=>$row['id'],'brand'=>$row['brand'],'model'=>$row['model']);
            array_push($resultArray, $tmp_array); 
        }
       
        return $resultArray;
    }

    function getOneCar($id)
    {
        $resultArray = array();
       
        $stmt = $this->con->prepare("select  cars.engine_capacity,cars.max_speed,cars.price,cars.year, model.model, color.color  from cars  join   model on cars.id=model.id join color_cars on color_cars.car_id=cars.id join color on color.id=color_cars.color_id   where cars.id =1");
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

    function getCarsByParams($params)
    {
        // $val = 'BMW';
        // $searchParam = 'Name';

        // $arr = array();

        // foreach($this->con->query('SELECT Cars.id, CarsModel.name, model 
        // from Cars,CarsModel 
        // where id_name = CarsModel.id') as $row) {
        //     $tmp_arr = array('id'=>$row['id'],'model'=>$row['model'],'name'=>$row['name']);
        //     array_push($arr, $tmp_arr); 
        // }
       
        // return $arr;

        // foreach ($this->autoCatalog as $item){
        //     if($item[$searchParam] == $val){
        //         $tmp_arr = array(
        //             'modelName'=>$item['Name'].":".$item['Model'],
        //             'year'=>$item['Year'],
        //             'engine'=>$item['Engine'],
        //             'color'=>$item['Color'],
        //             'maxspeed'=>$item['MaxSpeed'],
        //             'price'=>$item['Price']
        //         );
        //         array_push($arr, $tmp_arr);    
        //     }
        // }
        // return $arr;

        return "all cars by Params";
    }

}