<?php
include 'config.php';
class FileObj
{
    private $fileText;
    private $fileSavedText;


    public function __construct()
    {
        $this->fileText = file(PATH_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $this->fileSavedText = file(PATH_SFILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    }


    //FUNCTION READ ONE ROW 
    public function printOneRow($numStr)
    {  
        if($this->checkNumStr($numStr)==true || $this->checkNumStr($numStr)==0)
        {
            $arr=$this->fileText; 
            
            foreach($arr as $key=>$row):             
                if($numStr==$key)
                {
                    return $row= $key.")".$row;
                }                    
            endforeach;        
        }
        else
        {
            return ONEROW_FUNC_ERR;
        }
    }


    //FUNCTION Print ONE SYMBOL 
    public function printOneSymbol($numStr, $numSym)
    {
        if($this->checkNumStr($numStr)==true || $this->checkNumStr($numStr)==0  && $this->checkNumSym($numSym)==true || $this->checkNumSym($numSym)==0)
        {
            $arr=$this->fileText; 
            foreach($arr as $key=>$row):
                if($numStr==$key)
                {
                    $file=$row[$numSym];
                    return $file; 
                }                    
            endforeach;
        }
        else
        {
            return ONESYM_FUNC_ERR;
        }   
    }


 //FUNCTION PRINT ALL ROW 
 public function printAllRows()
 {  
     if($this->fileText)
     {
         $arr=$this->fileText; 
            for ($key = 0; $key <= count($arr); $key++) 
                { 
                    $rez.= $this->printOneRow($key)."&nbsp "; 
                } return trim($rez);         
     }
     else
     {      
         return ALLROW_FUNC_ERR;
     }
 }


 //FUNCTION PRINT ALL ROW in the saved file 
 public function printSavedAllRows()
 {  
     if($this->fileSavedText)
     {
        $arr=$this->fileSavedText;
        foreach($arr as $key=>$row):
            $rez.= $key.")".$row;
        endforeach;
            return $rez;      
     }
     else
     {      
         return ALLROW_FUNC_ERR;
     }
 }


//FUNCTION PRINT ALL SYMBOLS 
 public function printAllSymbol()
 {
     if($this->fileText)
     {
        $arr=$this->fileText;  
        foreach($arr as $row): 
            $rez=$row;
            $arrSym= str_split($rez);
                foreach($arrSym as $key=>$sym):
                    $rezult.= $sym."&nbsp &nbsp";
                endforeach;
        endforeach;
        return $rezult;
     }
     else
     {
         return ONESYM_FUNC_ERR;
     }
 }


    //FUNCTION replace one symbol in the row
    public function replaceOneSymbol($numStr, $numSym, $leter)
    {
        
        if(is_numeric($numStr) && is_numeric($numSym) && is_string($leter))
        {
            $this->fileText[$numStr][$numSym] = $leter;
            $saveReplaceSym=file_put_contents(PATH_SFILE, $this->fileText);
           
        }
        else 
        {
            return REPLACE_ERR;
        }
    }


    //FUNCTION replace one row in the file
    public function replaceOneRow($numStr, $row)
    {
        
        if(is_numeric($numStr) && is_string($row))
        {
            $this->fileText[$numStr] = $row;
            $rez=implode("\n", $this->fileText);
            $saveReplaceRow=file_put_contents(PATH_SFILE, $rez);
                   
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
        {
            return $numStr;
        }
        else
        {
            return false; 
        }
    }


    //VALIDATOR OF THE SYMBOL NUMBERS
    public function checkNumSym($numSym)
    {
        if(is_numeric($numSym) && is_int($numSym) && $numSym >=0)
        {
            return true;
        }
    else
    {
        return false; 
    }
    }

}