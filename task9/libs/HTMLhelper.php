<?php
include 'config.php';
class HTMLhelper
{
    private function __construct(){}

    //select-multi
     public static function selectMulty($name,$size,$selected,$arr,$style)
    {   if(is_numeric($size) && is_array($arr) && is_string($selected) && $style && is_string($name))
        {
            
        $menu="<select name=\"$name\" size=\"$size\" myltiple style=\" $style\">\n"; 
        foreach($arr as $opt)
        {   
           if($opt==$selected)
           {
            $menu.="<option selected>$opt</option>\n";
           } 
           $menu.="<option>$opt</option>\n";    
        }
        $menu.="</option></select>\n";
        
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
        {
            $myTable="<table class=\"$myclass\" id=\"$myid\" border=\"$myborder\" cellspacing=\"$mycellspacing\">\n" ;
            $myTable.="<tr>";
            foreach($arrTh as $th)
            {
                $myTable.="<th>$th</th>";
            }
            $myTable.="</tr>\n";
            foreach($arrTd as $td)
            {
                $myTable.="<tr><td>$td[№]</td><td>$td[Cityes]</td><td>$td[ZIPCOD]</td></tr>\n";
            }
            $myTable.="</table>\n"; 
             return $myTable; 
        }
        else
        {
            return TABLE_ERR;
        }
    }  
    
    public static function ol($mytypeol,$myclassol,$arrOl)
    {
        $res = false;
        if($mytypeol &&  is_string($myclassol)  &&  is_array($arrOl) )
        {
            $myOl="<ol type=\"$mytypeol\" class=\"$myclassol\">";
            foreach($arrOl as $ol):
                $myOl.="<li>$ol</li>";
            endforeach;
            $myOl.="</ol>";
            return $myOl;
        }
        else
        {
            return OL_ERR;
        }   
    }

    public static function ul($mytypeul,$myclassul,$arrul)
    {
        if(is_string($mytypeul) && is_string($myclassul) && is_array($arrul))
        {
            $myUl="<ul type=\"$mytypeul\" class=\"$myclassul\">";
            foreach($arrul as $ul):
                $myUl.="<li>$ul</li>";
            endforeach;
            $myUl.="</ul>";
            return $myUl; 
        }
        else
        {
           return UL_ERR;
        }
    }

    public static function  createRadio($type,$check,$name,$value)
    {
        if(is_string($type) && is_string($check) && is_string($name) && is_array($value))
        {   
            foreach($value as $key=>$val): 
                
                if($check==$key)
                {
                    $radio.="<input type=\"$type\" name=\"$name\" value=\"$key\" checked> $val\n";
                } 
                else {
                    $radio.="<input type=\"$type\" name=\"$name\" value=\"$key\"> $val\n";  }
            endforeach;
            return $radio;
        }
        else 
        {
            return RADIO_ERR;
        }

    }
}