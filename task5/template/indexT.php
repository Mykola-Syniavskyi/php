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

//----------ECHO CLASS SESSION-------------
echo "<h2><u>class Session :</u></h2>";
echo "<h4>Result of execution save Data to session".":&nbsp&nbsp<u>". $addSes."</u></h4>";
echo "<h4>Result of getting  Data from session".":&nbsp&nbsp<u>".$getSes."</u></h4>";
echo "<h4>Result of deleting Data from session".":&nbsp&nbsp<u>".$delSes."</u></h4>";

//----------ECHO CLASS COOKIE-------------
echo "<h2><u>class Cookie :</u></h2>";
echo "<h4>Result of execution save Data to cookie".":&nbsp&nbsp<u>". $addCook."</u></h4>";
echo "<h4>Result of getting  Data from cookie".":&nbsp&nbsp<u>".$getCook."</u></h4>";
echo "<h4>Result of deleting cookie".":&nbsp&nbsp<u>".$delCook."</u></h4>";


   
//----------ECHO CLASS MYSQL-------------
echo "<h2><u>class Mysql :</u></h2>";
echo "<h4>Result of execution save Data to Mysql".":&nbsp&nbsp<u>". $addMysql."</u></h4>";
while ($row = mysql_fetch_assoc($getMysql)):
echo "<h4>Result of getting  Data from Mysql".":&nbsp&nbsp<u>".$rezSql=$row['cars']." "."produced by"." ".$row['country']."</u></h4>"; endwhile;
echo "<h4>Result of deleting from Mysql".":&nbsp&nbsp<u>".$delMysql."</u></h4>";


//----------ECHO CLASS INI-------------
echo "<h2><u>class Ini :</u></h2>";
echo "<h4>Result of execution save Data to Ini".":&nbsp&nbsp<u>". $addIni."</u></h4>";
 foreach ($getIni as $k=>$val) :
echo "<h4>Result of getting  Data from Ini".":&nbsp&nbsp<u>".$k."=".$val."</u></h4>"; endforeach;
echo "<h4>Result of deleting Data from Ini".":&nbsp&nbsp<u>".$delIni."</u></h4>";



//----------ECHO CLASS JSON-------------
echo "<h2><u>class Json :</u></h2>";
echo "<h4>Result of execution save Data to Json".":&nbsp&nbsp<u>". $addJs."</u></h4>";
 foreach ($getJs as $k=>$val) :
echo "<h4>Result of getting  Data from Json".":&nbsp&nbsp<u>".$k."=".$val."</u></h4>"; endforeach;
echo "<h4>Result of deleting Data from Json".":&nbsp&nbsp<u>".$delJs."</u></h4>";