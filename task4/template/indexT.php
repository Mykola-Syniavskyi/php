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

</body>
</html>
<?




//echo $insert."<br>";
//echo $update."<br>";
//ECHO SELECT
if ($select)
{
    while ($row = mysql_fetch_assoc($select) ) 
    {             
       echo $result= $row["id"].$row["FirstName"].$row["LastName"]."<br>";       
    }
}


//echo $delete."<br>";


?>




