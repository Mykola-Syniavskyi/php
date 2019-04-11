<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>   
</body>
</html>
<?php



echo "<h2><u>class Session :</u></h2>";
echo "<h4>Result of execution save Data to session".":&nbsp&nbsp<u>". $addSes."</u></h4>";
echo "<h4>Result of getting  Data from session".":&nbsp&nbsp<u>".$getSes."</u></h4>";
echo "<h4>Result of deleting Data from session".":&nbsp&nbsp<u>".$delSes."</u></h4>";


echo "<h2><u>class Cookie :</u></h2>";
echo "<h4>Result of execution save Data to cookie".":&nbsp&nbsp<u>". $addCook."</u></h4>";
echo "<h4>Result of getting  Data from cookie".":&nbsp&nbsp<u>".$getCook."</u></h4>";
echo "<h4>Result of deleting cookie".":&nbsp&nbsp<u>".$delCook."</u></h4>";


   

echo "<h2><u>class Mysql :</u></h2>";
echo "<h4>Result of execution save Data to Mysql".":&nbsp&nbsp<u>". $addMysql."</u></h4>";
while ($row = mysql_fetch_assoc($getMysql)) 
{
echo "<h4>Result of getting  Data from Mysql".":&nbsp&nbsp<u>".$rezSql=$row['cars']." "."produced by"." ".$row['country']."</u></h4>";
}
echo "<h4>Result of deleting from Mysql".":&nbsp&nbsp<u>".$delMysql."</u></h4>";



echo "<h2><u>class Ini :</u></h2>";
echo "<h4>Result of execution save Data to Ini".":&nbsp&nbsp<u>". $addIni."</u></h4>";
echo "<h4>Result of getting  Data from Ini".":&nbsp&nbsp<u>".$getIni."</u></h4>";
echo "<h4>Result of deleting Data from Ini".":&nbsp&nbsp<u>".$delIni."</u></h4>";