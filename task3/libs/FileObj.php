<?php
include 'config.php';
class FileObj
{
    private $fileText;

    public function __construct()
    {
        $this->fileText = file(PATH_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    }

    public function setRow($numStr, $fileName )
    {
        if($this->checkNumStr($numStr)==true && $this->checkFiles($fileName)==true)
        {
            echo $numStr."<br>";
            echo $fileName."<br>";
            $arr=file($fileName);
            
        }
        else
        {
            Echo"!";
        }

    }

    public function setSymbol($numStr, $numSym, $fileName)
    {
        
    }


    //VALIDATOR OF THE STRNG NUMBERs
    public function checkNumStr($numStr)
    {
        if(is_numeric($numStr) && is_int($numStr) && $numStr>0)
        {echo'checkNumStr : t'."<br>";
            return $numStr;
        }
        else
        {
            echo'checkNumStr :f'."<br>";
            return false; 
        }
    }

    //VALIDATOR OF THE SYMBOL NUMBERS
    public function checkNumSym($numSym)
    {
        if(is_numeric($numSym) && is_int($numSym) && $numSym>0)
        {echo'checkNumSym : t'."<br>";
            return true;
        }
    else
    {
        echo'checkNumSym :f'."<br>";
        return false; 
    }
    }

    //VALIDATOR OF THE FILES
    public function checkFiles($fileName)
    {
         if ( trim(file_get_contents($fileName)) !== false ) 
        { echo'checkFiles :T'."<br>";
                return true;            
        }
        else
        {echo'checkFiles :F'."<br>";
            return false;
        }
    }





    




    

}