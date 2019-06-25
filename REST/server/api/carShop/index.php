<?php
include 'restServer.php';
class carShop extends restServer
{
    protected $sortVuew;
    protected $arrayAllCars;
    protected $arrayOneCar;


    function getAllCars()
    { //print_r('fff');
        $resultArray = array();
        $dbh = new PDO(DSN, USER, PASSWD);// print_r($dbh);
        foreach($dbh->query("select cars.id, brand.brand, model.model  from cars join brand on cars.id=brand.id join   model on cars.id=model.id") as $row) 
        {
            $tmp_array = array('id'=>$row['id'],'brand'=>$row['brand'],'model'=>$row['model']);
            array_push($resultArray, $tmp_array); 
        }
       $this->arrayAllCars = $resultArray;
       $this->vuewRez($this->arrayAllCars, $this->sortVuew);
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
             $this->arrayOneCar = $resultArray;
            $this->vuewRez($this->arrayOneCar, $this->sortVuew);
        return $resultArray;
        
       
    }



    public function getSortVuew()
    {
        $id = substr($this->url, strrpos($this->url, '/') + 1); //print_r($id);
        $this->sortVuew = $id; //print_r($this->sortVuew);
        // return $this->sortVuew;

    }



    private function vuewRez($result, $sortVuew = 'json')
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: text/html; charset=utf-8'); 
        header('Cache-Control: no-cache');

        if (!$result)
        {
            header("HTTP/1.1 400 Bad Request Api");
            $result = '404 Sorry, we cant find this action!';
        }
         
 
        //ставим заголовок
        switch ($sortVuew) {
            case '.txt':
           //echo "HELLO PHP";
                header('Content-type: text/plain');
                print_r($result);
                break;
            case '.html':
                header('Content-type: text/html'); //print_r($result);//die();
                if ($this->arrayAllCars)
                {
                    $counter = 0;
                    $counter = count($result); 
                    $i=0;
                    while ( $i < $counter )
                    {
                        foreach ($result[$i++] as $key=>$val)
                        {
                            echo "<pre>". $key . " : " . $val . "; ";
                        }
                    }
                }else
                {            
                    foreach ($result[0] as $key=>$val) 
                    { 
                        echo "<pre>". $key  ." : ". $val . "; ";   
                    }
                }  
                break;
            case '.xml':
                header('Content-type: application/xml');
                echo $this->toXml($result);
                break;
            default:
                header('Content-Type: application/json');
                echo json_encode($result);
                break;
        }
    }

    public function toXml($result)
    {   
        $xml = new SimpleXMLElement('<root/>');
        foreach ($result as $key =>$val)
        {  $result = array_flip($val); 
           array_walk_recursive($result, array ($xml, 'addChild'));
        }//die();
      
        print $xml->asXML();
    }

    
}





$obj = new carShop();
$obj->parsUrl();
// $obj->setMethod('Test', "Vasia");
$obj->getMethod();
echo $obj->getErrors();