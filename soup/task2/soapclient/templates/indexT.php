<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style type="text/css">
        h3{text-align:center; color: #4286f4;}
        h4{text-align:center; color: #4286f4;}
        h5{text-align:center; color: white;}
        table{color:white; }
        body{width: 80%; margin:auto; background-image: url('templates/car.jpg'); background-size: cover;}
        .shopList{width:50%; float:right;}
        .col-auto{width: 60%;}
        .prompt{float: right; margin-top:20%;}
        .rezSearch{float: left; width:30%;}
        #find{text-align:left;}
        
    </style>

    <title>Cars shop</title>
</head>
<body>
    <? if ($placeholders){

       ?> <div style="color: #FF0000; font-size: 15px;"><strong>%ERROR_YEAR%</strong></div>
    <?}?>
    <div class="main">
        <h3 class="alert alert-success" role="alert">Cars shop</h3>
        <div class="shopList">
        <h4>Cars list</h4>
            <? if ($carList)
            {
                foreach ($carList as $key=> $val){
             ?>
        <ul>
        <li class="alert alert-primary" role="alert"><?=$val['id']?>&nbsp <?=$val['brand']?> &nbsp <?=$val['model']?> &nbsp &nbsp &nbsp &nbsp  <a href="more.php?more&id=<?= $val['id'] ?>" class="more"> |more info|</a></li> 
        
        </ul>
            <?}
            }?>
        </div>
        <div class="find">
        <h4 id="find">Find car by params</h4>
        <form method="POST">
            <div class="form-row align-items-center">
                <div class="col-auto my-4">
                
                <select class="custom-select mr-sm-2" name="brand">
                    <option disabled selected>Choose brand</option>
                    <option value="skoda">Skoda</option>
                    <option value="audi">Audi</option>
                    <option value="toyota">Toyota</option>
                </select>
                
                <select class="custom-select mr-sm-2"  name="year">
                    <option  disabled selected>Choose year</option>
                    <option value="2010">2010</option>
                    <option value="2012">2012</option>
                    <option value="2015">2015</option>
                </select>
                <select class=" custom-select mr-sm-2 "  name="model">
                    <option disabled selected>Choose model</option>
                    <option value="tt">tt</option>
                    <option value="fabia">fabia</option>
                    <option value="colola">colola</option>
                    <option value="octavia">octavia</option>
                </select>
                <select class="custom-select mr-sm-2" name="max_speed">
                    <option disabled selected>Choose max_speed</option>
                    <option value="180">180</option>
                    <option value="200">200</option>
                    <option value="220">220</option>
                    <option value="225">225</option>
                </select>
                <select class="custom-select mr-sm-2"  name="engine_capacity">
                    <option disabled selected >Choose engine_capacity</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <select class="custom-select mr-sm-2"  name="color">
                    <option disabled selected>Choose color</option>
                    <option value="black">black</option>
                    <option value="white">white</option>
                    <option value="red">red</option>
                </select>
                <select class="custom-select mr-sm-2" name="price">
                    <option disabled selected>Choose price</option>
                    <option value="180000">180000</option>
                    <option value="200000">200000</option>
                    <option value="250000">250000</option>
                    <option value="250000">270000</option>
                </select>
                </div>
                <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Run -></button>
                </div>
            </div>
        </form>
        </div>
        <div class="prompt">
            <h5>Search helper</h5> 
            <table cellspacing="2" border="1" cellpadding="5" border-color="white">
                <tr><th>brand</th><th>year</th><th>model</th><th>max_speed</th><th>engine_capacity</th><th>color</th><th>price</th></tr>
                <tr><td>skoda</td><td>2010</td><td>fabia</td><td>180</td><td>2</td><td>black</td><td>180000</td></tr>
                <tr><td>audi</td><td>2012</td><td>tt</td><td>200</td><td>2</td><td>white</td><td>200000</td></tr>
                <tr><td>toyota</td><td>2015</td><td>corolla</td><td>220</td><td>2</td><td>red</td><td>250000</td></tr>
            </table>
        </div>
        <div class="rezSearch">
            <? if ($rezSearch){?>
               <h3>Result of searching</h3>
        <ul>
        <li class="alert alert-primary" role="alert"><?=$rezSearch[0]['id']?>&nbsp<?=$rezSearch[0]['brand']?>&nbsp<?=$rezSearch[0]['model']?> &nbsp &nbsp &nbsp &nbsp  <a href="more.php?more&id=<?=$rezSearch[0]['id']?>" class="more"> |more info|</a></li>
        </ul>
        <?}?>
        </div>

    </div>
</body>
</html>
 