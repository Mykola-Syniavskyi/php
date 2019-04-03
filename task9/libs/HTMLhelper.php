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
           else
           {
                $menu.="<option>$opt</option>\n"; 
           }
              
        }
        $menu.="</option></select>\n";
        
        return $menu;
        }
        else
        {   
            return SELECT_ERR;
        }
             
    }
    


    //Create Table
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
    


     //Create list OL
    public static function ol($mytypeol,$myclassol,$arrOl)
    {
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



    //Create list UL
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



    //CREATE radibuttons
    public static function  createRadio($type,$check,$name,$value)
    {
        if(is_string($type) && is_string($check) && is_string($name) && is_array($value))
        {   
            foreach($value as $key=>$val): 
                
                if($check==$key)
                {
                    $radio.="<br><input type=\"$type\" name=\"$name\" value=\"$key\" checked> $val\n";
                } 
                else {
                    $radio.="<br><input type=\"$type\" name=\"$name\" value=\"$key\"> $val\n";  }
            endforeach;
            return $radio;
        }
        else 
        {
            return RADIO_ERR;
        }
    }



    //Create list createCheckbox
    public static function  createCheckbox($type,$check,$name,$value)
    {
        if(is_string($type) && is_string($check) && is_string($name) && is_array($value))
        {   
            foreach($value as $key=>$val): 
                
                if($check==$key)
                {
                    $checkbox.="<br><input type=\"$type\" name=\"$name\" value=\"$key\" checked> $val\n";
                } 
                else {
                    $checkbox.="<br><input type=\"$type\" name=\"$name\" value=\"$key\"> $val\n";  }
            endforeach;
            return $checkbox;
        }
        else 
        {
            return CHECKBOX_ERR;
        }
    }



    //CREATE LIST DL DT DD
    public static function createDl($myclassDl, $arrDl )
    {   
        if(is_string($myclassDl) && is_array($arrDl) )
        {   
            $mydl="<dl class=\"$myclassDl\">";
            foreach($arrDl as $key=>$val): 
                $mydl.= "<dt>$key <dd>$val";               
            endforeach;
            $mydl.="</dl>";
            return $mydl;
        }
        else
        {
            return DLDTDD_ERR;
        }   
    }
}