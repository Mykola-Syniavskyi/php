<?php
include 'config.php';
class FileObj
{
    private $fileText;

    public function __construct()
    {
        $this->fileText = file(PATH_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    }



    //FUNCTION READ ONE ROW 
    public function readOneRow($numStr, $fileName )
    {  
        if($this->checkNumStr($numStr)==true || $this->checkNumStr($numStr)==0 && $this->checkFiles($fileName)==true)
        {
            $arr=file($fileName); 
            
            foreach($arr as $key=>$row):             
                if($numStr==$key)
                {
                    return $row= $key.")".$row;
                }                    
            endforeach;        
        }
        else
        {
            return SET_FUNC_ERR;
        }
    }



    //FUNCTION READ ONE SYMBOL 
    public function readOneSymbol($numStr, $numSym, $fileName)
    {
        if($this->checkNumStr($numStr)==true || $this->checkNumStr($numStr)==0 && $this->checkFiles($fileName)==true && $this->checkNumSym($numSym)==true || $this->checkNumSym($numSym)==0)
        {
            $arr=file($fileName); //print_r($arr);
            foreach($arr as $key=>$row):
                if($numStr==$key)
                {
                    $file=$row[$numSym];
                    return $file; 
                }                    
            endforeach;
        }
    
    }




    public function replaceOneSymbol($numStr, $numSym, $fileName)
    {
        if($this->readOneSymbol($numStr, $numSym, $fileName)==true && $this->readOneRow($numStr, $fileName )==true)
        {   $oneSymb=$this->readOneSymbol($numStr, $numSym, $fileName);
            $oneRow=$this->readOneRow($numStr, $fileName );
            $symReplace= ereg_replace($oneSymb,"h", $oneRow );//print_r(file($fileName));
            $saveReplaceSym=file_put_contents(PATH_SFILE, $symReplace);
            return true;
        }
        else 
        {
            return REPLACE_ERR;
        }
    }



    //VALIDATOR OF THE STRNG NUMBERs
    public function checkNumStr($numStr)
    {   
        
        if(is_int($numStr) && $numStr >=0)
        {echo'checkNumStr : TRUE'."<br>";
            return $numStr;
        }
        else
        {
            echo'checkNumStr :FALSE'."<br>";
            return false; 
        }
    }

    //VALIDATOR OF THE SYMBOL NUMBERS
    public function checkNumSym($numSym)
    {
        if(is_numeric($numSym) && is_int($numSym) && $numSym >=0)
        {echo'checkNumSym : TRUE'."<br>";
            return true;
        }
    else
    {
        echo'checkNumSym :FALSE'."<br>";
        return false; 
    }
    }

    //VALIDATOR OF THE FILES
    public function checkFiles($fileName)
    {
         if ( trim(file_get_contents($fileName)) !== false ) 
        { echo'checkFiles :TRUE'."<br>";
            return true;            
        }
        else
        {echo'checkFiles :FALSE'."<br>";
            return false;
        }
    }  

}