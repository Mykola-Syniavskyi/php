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
<h3> ===========MYSQL============</h3>
<h5>RESULT AFTER OPERATIONS INSERT, UPDATE, DELETE :</h5>
<?
if ($select)
{$i=1;
    while ($row = mysql_fetch_assoc($select) ) 
    {             
       echo $result= $i++.")"." ".$row["FirstName"]." ".$row["LastName"]."<br>";       
    }
}
?>
</div>

<!--show result PGSQL-->

<div style="background-color: lightgray;" >
<h3> ===========POSTGRESQL============</h3>
<h5> RESULT AFTER OPERATIONS INSERT, UPDATE, DELETE :</h5>
<?
if ($selectPg)
{   $i=1;
    while ($row = pg_fetch_assoc($selectPg) ) 
    {             
       echo  $result= $i++.")"." ".$row["firstname"]." ".$row["lastname"]."<br>";       
    }
}
?>

</div>
</body>
</html>
<?












