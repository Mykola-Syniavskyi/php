<?php
include ('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Action with BASE</title>
</head>
<body>
<!--show result MYSQL-->
<div style="background-color: lightgray; " >
<h3 style="background-color: #cb42f4; width:50%; margin: auto;"> ================ActiveRecord MY_TEST with SQL===============</h3>
<h5 style="background-color: #cb42f4; width:50%; margin: auto;">================RESULT AFTER OPERATIONS INSERT, UPDATE, DELETE :================</h5>
<?
if ($findAll)
 ?>
 <table border="1" cellspacing="0" style="width:50%; margin: auto;">
 <tr><td>№</td><td>title</td><td>description</td><td>price($)</td><td>id</td></tr>
 <?
{$i=1;
    foreach ($findAll as $obj) 
    { ?>            
        <tr><td><?=$i++?></td><td><?=$obj->getTitle()?></td><td><?=$obj->getDescription()?></td><td><?=$obj->getPrice()?></td><td><?=$obj->getId()?></td></tr>

        <?
    }
}
?>
</table>
</div>

