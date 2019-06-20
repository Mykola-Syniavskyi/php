<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style type="text/css">
    span{color:black; font-weight:600;}
        h3{text-align:center; color: #4286f4;}
        h4{text-align:center; color: #4286f4;}
        a{color:black;font-weight:600;}
        body{width: 80%; margin:auto; background-image: url('templates/car.jpg'); background-size: cover;}
        .shopList{width:50%; float:right;}
        .col-auto{width: 60%;}
        .return{margin-top:10px;}
        .btn_buy{margin-top:10px;}
        .buy{width:70%;}
        .select_pay{width:30%;}
        #find{text-align:left;}
        
    </style>

    <title>Cars shop</title>
</head>
<body>
    <div class="main">
    <h3 class="alert alert-success" role="alert">Cars shop</h3>
    <div class="getInfo">
    <?php
    include 'SoupClient.php';
    $obj = new SoupClient();
        if (isset($_GET['id']))
        {
            $id= $_GET['id']; 
            $getInfo= $obj->getCar($id);
        }
        else
        {
            echo "nooooooo";
        }
        if ($getInfo)
        foreach ($getInfo as $key=>$val)
        {?>
             
             <h3 class="alert alert-success" role="alert">Model of the one:&nbsp <?=$val['model'];?></h4>
            <li  class="alert alert-info" role="alert">Engine capacity of the one:&nbsp <span><?=$val['engine_capacity'];?></span>&nbspliter</li>
            <li  class="alert alert-info" role="alert">Year of manufacture:&nbsp <span><?=$val['year'];?></span>&nbspyear</li>
            <li  class="alert alert-info" role="alert">Color of the one:&nbsp<span><?=$val['color'];?></span>&nbsp</li>
            <li  class="alert alert-info" role="alert">Max Speed: &nbsp<span><?=$val['max_speed'];?></span>&nbspkm/h</li>
            <li  class="alert alert-info" role="alert">Ones price: &nbsp<span><?=$val['price'];?></span>&nbspuan</li>
            </ul>
       <?
        }else{
            echo 'yps';
        }
        ?>
        <div class="buy">
        <form>
            <div class="form-row">
                <div class="col-3">
                <input type="text" class="form-control" placeholder="First name">
                </div><br>
                <div class="col-3">
                <input type="text" class="form-control" placeholder="Last name">
                </div>              
            </div><br>
            <select class="custom-select mr-sm-3 select_pay" id="inlineFormCustomSelect">
                <option selected>Choose pay variant</option>
                <option value="1">credit cart</option>
                <option value="2">cash</option>
            </select>
        </form>
        <button type="submit" class="btn btn-primary btn_buy">Buy this car</button>
        </div>

        <div class="return"><button type='button' class="btn btn-primary"><a href="index.php"><- Back to main</a></button></div>
    </div>
    
      
    