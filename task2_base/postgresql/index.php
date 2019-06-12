<?php
$host='127.0.0.1';
$user='user15';
$paswwd='user15';
$db='user15';
$link;

function conect()
{  
    global $user;
    global $paswwd;
    global $db;
    global $host;
    $conn_string = "host= 127.0.0.1 port= 5432 dbname=user15 user=user15 password=user15";
    $link=pg_connect($conn_string); 
         return $link;
         //return "no conect";
    
}
 
$rezCon=conect(); 




//----create mame
function createName()
{
    return $passwor=base64_encode(md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)) . 
    md5(uniqid(rand(), true)));
    
    
   
}
//echo createName(); 



function insert()
{   
    if ($link = conect())   
    {   $crName=createName();
        set_time_limit(500);
        $i = 0;//print_r($link);
        while ($i <=900000-1) 
        {$crName=createName();
        $crName=substr($crName.$crName,6);
        
         $desc =$crName;
         $desc .=$crName; 
         $desc .=$crName;   
             //echo strlen($desc);
         //echo strlen($crName);
         $i++;
         $query="INSERT INTO books (id, name, description) VALUES (".$i.", '".$crName."', '".$desc."' )";  
         $rez= pg_query($link,$query);  
         
         //echo "$i <br>";
        }
    }
   
}
insert();



?>
