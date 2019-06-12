<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEST-SOUP</title>
</head>
<body>
    <div style="background:lightgrey; width:20%; float:left;">
    <h3 style="background: yellow;">Кода и названия стран:</h3>
    <h3 style="background: yellow;">SOUP</h3>
        <?
        // foreach ($arrFullSoupWithOutParam as $key=> $val)
        // {
        //     echo "Название страны :". $val->sName."<br>";
        //     echo " Код страны :". $val->sISOCode ."<br>";
        // }
        ?>
    </div>
    <div style="background:lightgrey; width:20%; float:left; margin-left:10px;">
    <h3 style="background: yellow;">Результат поиска кодов стран по названию страны: :</h3>
    <h3 style="background: yellow;">SOUP(with Params!)</h3>
    <?
       
    //    foreach ($arrFullSoupWithOutParam as $key=> $val)
    //     {
            
    //         $params = array('sCountryName'=>$val->sName);
    //         $dataSoupWithParam= $rez->CountryISOCode($params);// find info with  parameters 
    //         $rezFinal=$dataSoupWithParam->CountryISOCodeResult;
    //         echo " Код страны :". $rezFinal ."<br>";
    //     }
        ?>
    </div>


    <div style="background:lightgrey; width:20%; float:left; margin-left:10px;">
    <h3 style="background: yellow;">Кода и названия стран :</h3>
    <h3 style="background: yellow;">CURL</h3>
    <?
       //echo "<pre>".print_r($rez1->mListOfCountryNamesByCodeResponse->mListOfCountryNamesByCodeResult, true)."</pre>";
    //    foreach ($finalRezArr as $key=>$val)
    //    {
    //        foreach($val as $k=>$v)
    //        {
    //            echo $k . " " . $v;
    //        } 
    //    }
        ?>
    </div>

</body>
</html>

