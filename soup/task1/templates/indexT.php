<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>SOUP rezult without parameters :</h3>
    <?php
    foreach($rez as $key=>$item)
    {
       echo "Код континента:" .$item->sCode."<br>";
       echo "Название континента:". $item->sName."<br>";
       
    }
    ?>

    <hr>
    <h3>SOUP rezult with parameters :</h3>

    <?php
    
    foreach($rez as $key=>$item)
{
    $allData=$client->CountryName(['sCountryISOCode'=>"$item->sCode"]);
    echo "Код страны:". $item->sCode."<br>";
    echo "Название страны:". $allData->CountryNameResult."<br>";
}
    
    ?>
</body>
</html>
