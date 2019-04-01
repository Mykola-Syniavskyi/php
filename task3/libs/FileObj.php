<?php
include 'config.php';
class FileObj
{
    private $fileBox;

    public function __construct()
    {
        $this->fileBox = file(PATH_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }




    function readFileRow()
    {
       $fo= file( PATH_FILE);
            for($rowId=1; $rowId<=count($fo); ) 
            {
                foreach($fo as $item){
                    echo "<pre>".$rowId++.'.'  .$item; 
                }
            
            }      
      
       
    }
        

    //    for($i=0; $i<=count($fo); $i++)
    //    {echo "<pre>";
    //     print_r($fo[$i]) ;
    //     echo "</pre>";
    //     }
    
    




    function readFileSymbol()
     {
        $fo= file(PATH_FILE); //print_r($fo);
        foreach($fo as $item)
        {
            echo $str=$item;
        }



        //$symbol=str_split($fo);
    //    for($i=0; $i<=count($fo); $i++)
    //    {
    //     echo $fo[$i];
    //     }

       }

}