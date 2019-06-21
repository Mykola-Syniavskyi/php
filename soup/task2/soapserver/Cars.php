<?php
include 'config.php';
class Cars 
{
    private $model;
    private $brand;
    private $engine_capacity;
    private $year;
    private $color;
    private $price;
    private $max_speed;
    private $firstname;
    private $lastname;
    private $payments;
    private $car_id;
  




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
        $dbh = new PDO(DSN, USER, PASSWD);
        $stmt = $dbh->prepare("select  cars.engine_capacity,cars.max_speed,cars.price,cars.year, model.model, color.color  from cars  join   model on cars.id=model.id join color_cars on color_cars.car_id=cars.id join color on color.id=color_cars.color_id   where cars.id =?");
        $stmt->execute([$id]); 
        $row = $stmt->fetch();

            $tmp_arr = array(
            'model'=>$row['model'],    
            'engine_capacity'=>$row['engine_capacity'],
            'year'=>$row['year'],
            'color'=>$row['color'],
            'max_speed'=>$row['max_speed'],
            'price'=>$row['price']);
            array_push($resultArray, $tmp_arr); 
        
        return $resultArray;
       
    }

    function getCarsByParams($params)
    {
        foreach ($params as $key=>$val)
        {
            if ($key == 'brand')
            {
                $this->brand= $val; 
            }

            if ($key == 'year')
            {
                $this->year= $val; 
            }


            if ($key == 'model')
            {
                $this->model= $val; 
            }
            

        

            if ($key == 'engine_capacity')
            {
                $this->engine_capacity= $val;
            }
            

            
            
            if ($key == 'color')
            {
                $this->color= $val; 
            }
           

            if ($key == 'max_speed')
            {
                $this->max_speed= $val; 
            }

            if ($key == 'price')
            {
                $this->price= $val; 
            }
        }
        //print_r($params);
        $dbh = new PDO(DSN, USER, PASSWD); 
        $arr = array();
        $count= count($params); //print_r($count);
        if ($count >0)

        {  
            $quer= " SELECT cars.id, cars.engine_capacity,cars.max_speed,cars.price,cars.year, model.model, color.color, brand.brand  from cars  join   model on cars.id=model.id join color_cars on color_cars.car_id=cars.id join color on color.id=color_cars.color_id join brand on brand.id=cars.id   WHERE cars.year= $this->year " . $this->addEngine_capacity() . $this->addMax_speed() . $this->addModel() . $this->addBrand() . $this->addPrice() . $this->addColor();
           //print_r(" SELECT cars.id, cars.engine_capacity,cars.max_speed,cars.price,cars.year, model.model, color.color, brand.brand  from cars  join   model on cars.id=model.id join color_cars on color_cars.car_id=cars.id join color on color.id=color_cars.color_id join brand on brand.id=cars.id   WHERE cars.year= $this->year " . $this->addEngine_capacity() .  $this->addMax_speed() . $this->addModel() . $this->addBrand() . $this->addPrice() . $this->addColor());
            foreach($dbh->query($quer) as $row) 
           { 
                $tmp_arr = array('id'=>$row['id'],'model'=>$row['model'], 'engine_capacity'=>$row['engine_capacity'],'year'=>$row['year'] , 'color'=>$row['color'], 'max_speed'=>$row['max_speed'], 'brand'=>$row['brand'], 'price'=>$row['price']  );
                array_push($arr, $tmp_arr); 
           } 
           return $arr ;
        
            
        }  
    }




   


    public function addEngine_capacity()
    {
        if ($this->engine_capacity)
        {
            return " and engine_capacity= $this->engine_capacity ";
        }
        else 
        {
            return ' ';
        }
    }


    public function addMax_speed()
    {
        if ($this->max_speed)
        {
            return " and max_speed= $this->max_speed ";
        }
        else 
        {
            return ' ';
        }
    }


    public function addModel()
    {
        if ($this->model)
        {
            return " and model= '$this->model' ";
        }
        else 
        {
            return ' ';
        }
    }


    public function addBrand()
    {
        if ($this->brand)
        {
            return " and brand= '$this->brand' ";
        }
        else 
        {
            return ' ';
        }
    }


    public function addPrice()
    {
        if ($this->price)
        {
            return " and price= '$this->price' ";
        }
        else 
        {
            return ' ';
        }
    }


    public function addColor()
    {
        if ($this->color)
        {
            return " and color= '$this->color' ";
        }
        else 
        {
            return ' ';
        }
    }


    public function addOrder($params)
    {
        $count = count($params);
        if ($count > 0 && is_array($params))
        {  
            $dbh = new PDO(DSN, USER, PASSWD);
            foreach ($params as $key => $val)
            {
                if ($key == 'firstname')
                {
                    $this->firstname=$val;
                }

                if ($key == 'lastname')
                {
                    $this->lastname=$val;
                }

                if ($key == 'car_id')
                {
                    $this->car_id=$val;
                }

                if ($key == 'payments')
                {
                    $this->payments=$val;
                }
                  
            }
            $sql = " INSERT INTO orders (car_id,payments,lastname,firstname)values('$this->car_id','$this->payments','$this->lastname','$this->firstname')";
        // print_r($sql);
        $statement = $dbh->prepare($sql);
        $statement->execute();
        $rez = $statement; 
        return $rez;   
        }
        else 
        {
            return 'yps';
        }
    }


}