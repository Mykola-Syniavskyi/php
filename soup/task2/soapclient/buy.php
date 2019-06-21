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
        <div class="buy">
        <form method="POST">
            <div class="form-row">
                <div class="col-3">
                <input type="text" class="form-control" name="firstname" placeholder="First name">
                </div><br>
                <div class="col-3">
                <input type="text" class="form-control" name="lastname" placeholder="Last name">
                </div>              
            </div><br>
            <select class="custom-select mr-sm-3 select_pay" id="inlineFormCustomSelect" name="payments">
                <option disabled selected>Choose pay variant</option>
                <option value="credit card">credit cart</option>
                <option value="cash">cash</option>
            </select>
            <button type="submit" class="btn btn-primary btn_buy" >Buy this car</button>
        </form>
        
        </div>

        <div class="return"><button type='button' class="btn btn-primary"><a href="index.php"><- Back to main</a></button></div>
    </div>
    <?php
    
     include 'SoupClient.php';
    
      $obj = new SoupClient();
      
    // // print_r($carList);
    if (is_array($_POST) && is_string($_GET['id']))
    {
       $params= $_POST;
       $id = $_GET;
       //print_r($id);
        $buy=$obj->buyCar($params, $id);
    }
    