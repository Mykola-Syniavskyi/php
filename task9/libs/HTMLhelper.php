<?php
include 'config.php';
class HTMLhelper
{
    private function __construct(){}

    //select-multi
     public static function selectMulty($name,$size,$select,$arr,$action)
    {   if(is_numeric($size) && is_array($arr) && is_string($select) && is_string($action) && is_string($name))
        {
            $menu="<form action=\"$action\">\n";
        $menu.="<select name=\"$name\" size=\"$size\" $select >\n"; 
        foreach($arr as $opt)
        {
           $menu.="<option>$opt</option>\n";    
        }
        $menu.="</option>\n";
        $menu.="</form>\n";
        return $menu;
        }
        else
        {   
            return SELECT_ERR;
        }
             
    }

    public static function createTable($myclass, $myid, $myborder, $mycellspacing, $arrTh, $arrTd )
    {
        if(is_string($myclass) && is_string( $myid) && is_numeric($myborder) && is_numeric($mycellspacing) && is_array($arrTh) && is_array($arrTd))
        {echo "ttt";
            $myTable="<table class=\"$myclass\" id=\"$myid\" border=\"$myborder\" cellspacing=\"$mycellspacing\">\n" ;
            $myTable.="<tr>";
            foreach($arrTh as $th)
            {
                $myTable.="<th>$th</th>";
            }
            $myTable.="</tr>\n";
           // $myTable.="<tr>";
            foreach($arrTd as $td)
            {
                $myTable.="<tr><td>$td[№]</td><td>$td[Cityes]</td><td>$td[ZIPCOD]</td></tr>\n";
            }
            $myTable.="</table>\n"; 
             return $myTable; 
        }
        else
        {echo "FFF";
            return TABLE_ERR;
        }
    }   


}