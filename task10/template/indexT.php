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
<div style="background-color: gray;" >
<h3 style="background:yellow; width:45%;"> =======================MYSQL========================</h3>
<h5 style="background:yellow; width:45%;">RESULT AFTER OPERATIONS INSERT, UPDATE, DELETE, SELECT :</h5>
<?

if ($select) 
{  ?> 
    <table  border="2" width="45%" cellpadding="0">
    <caption><h3>Students</h3></caption>
        <tr>
            <th>N</th>
            <th>Firt Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Sex</th>

        </tr>

    <?$i=1;
    while($row = $select->fetch()) 
    {?>  
        <tr>
            <td><?=$i++?></td>
            <td><?=$row['FirstName']?></td>
            <td><?=$row['LastName']?></td>
            <td><?=$row['Age']?></td>
            <td><?=$row['Sex']?></td>
        </tr> 
<?}}?>
    </table>
    
</div>

<!--show result PGSQL-->

<div style="background-color: lightgray;" >
<h3 style="background:yellow; width:45%;"> ===========POSTGRESQL============</h3>
<h5 style="background:yellow; width:45%;" > RESULT AFTER OPERATIONS INSERT, UPDATE, DELETE :</h5>
<?
if ($selectPg)
{  ?> 
    <table  border="2" width="45%" cellpadding="0">
    <caption><h3>Students</h3></caption>
    <tr>
    <th>N</th>
    <th>Firt Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>Sex</th>
    </tr>
    
    <?$i=1;
    while($row = $selectPg->fetch()) {?>
       
        <tr>
            <td><?=$i++?></td>
            <td><?=$row['firstname']?></td>
            <td><?=$row['lastname']?></td>
            <td><?=$row['age']?></td>
            <td><?=$row['sex']?></td>
        </tr>
   
    <?}
}?>
    </table>

</div>
</body>
</html>












