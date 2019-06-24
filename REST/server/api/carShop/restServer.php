<?php
include 'config.php';
class restServer
{
    protected $url;
    protected $method ;
    protected $params;
    protected $nameMethod;


    public function parsUrl()
    
    {
       if  ($_SERVER['REQUEST_URI'])
       {
           $arrMethod= array();
           $arrParams= array();
           $this->url= $_SERVER['REQUEST_URI'];  
            $arrRez = explode('/',$this->nameMethod= substr($this->url, 42));
            $this->method = $_SERVER['REQUEST_METHOD'];
            foreach ($arrRez as $key=>$val)
            {
                if ($key==0)
                {
                    array_push($arrMethod, $val); 
                    $this->nameMethod = $arrMethod[0];
                }
                if ($key==1)
                {
                     array_push($arrParams, $val);
                     $this->params = $arrParams;

                }

            
                //print_r($this->params[0]);
            }//print_r( $this->nameMethod);

       }
    }


    public function getMethod()
    {   //print_r($this->method);
                switch($this->method)
        {   
            case 'GET':
            //echo  123;
                $this->setMethod('get'.ucfirst($this->nameMethod), $this->params[0]);


                break;
            case 'DELETE':
                $this->setMethod('delete'.ucfirst($this->nameMethod), $this->params[0]);
                break;
            case 'POST':
                $this->setMethod('post'.ucfirst($this->nameMethod), $this->params[0]);
                break;
            case 'PUT':
                $this->setMethod('put'.ucfirst($this->nameMethod), $this->params[0]);
                break;
            default:
                return false;
        }
    }

    
    // public function Test($param)
    // {
    //     echo "hello, $param";
    // }

    function setMethod($method, $param=false)
    { 
         
        if (method_exists($this, $method) )
        { 
            call_user_func(array($this, $method) ,$param );
        }
    }


    function getAllCars()
    { //print_r('fff');
        $resultArray = array();
        $dbh = new PDO(DSN, USER, PASSWD);// print_r($dbh);
        foreach($dbh->query("select cars.id, brand.brand, model.model  from cars join brand on cars.id=brand.id join   model on cars.id=model.id") as $row) 
        {
            $tmp_array = array('id'=>$row['id'],'brand'=>$row['brand'],'model'=>$row['model']);
            array_push($resultArray, $tmp_array); 
        }
       //print_r($resultArray);
       $this->vuewRez($resultArray);
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


    protected function vuewRez($rez)
    {
        if ($rez)
        {
            header('Content-Type: application/json');
            echo json_encode($rez);
        }else{
            header('Content-type: text/html');
            echo $result = '404 No such action!';
        }
        
                
    }



    // private function showRes($result, $viewType = 'json')
    // {
    //     header('Access-Control-Allow-Origin: *');
    //     header('Content-Type: text/html; charset=utf-8'); 
    //     header('Cache-Control: no-cache');

    //     if (!$result)
    //     {
    //         header("HTTP/1.1 400 Bad Request Api");
    //         $result = '404 No such action!';
    //     }
        
 
    //     //ставим заголовок
    //     switch ($viewType) {
    //         case 'txt':
    //             header('Content-type: text/plain');
    //             print_r($result);
    //             break;
    //         case 'html':
    //             header('Content-type: text/html');
    //             echo ($result);
    //             break;
    //         case 'xml':
    //             header('Content-type: application/xml');
    //             echo $this->toXml($result);
    //             break;
    //         default:
    //             header('Content-Type: application/json');
    //             echo json_encode($result);
    //             break;
    //     }
    // }
    

}