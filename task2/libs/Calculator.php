<?php
include'config.php';

class Calculator
    {
        private $a;
        private $b;
        private $memVal;

        public function __construct()
            {
                $this->a= NULL;
                $this->b= NULL;
                $this->memVal=NULL;
            }

        public function SetA($valueA)
        {             
                 if(is_numeric($valueA) && is_int($valueA)) //checking for integer and number
                { 
                   return $this->a = $valueA ; 
                }else
                {    
                    return $this->a = ERR_NUM1_1;    
                }
        }

        public function SetB($valueB)
        {
            if(is_numeric($valueB) && is_int($valueB))//checking for integer and number
                {
                  return  $this->b= $valueB;   
                }else
                {
                    return $this->b = ERR_NUM2_1;
                }
        }
            
        public function GetA()
        {
                 if($this->$a != NULL)
                 {
                    return $this->a; 
                 }else
                 {
                     echo $this->ERR_NUM1_2;
                 }
        }

        
        public function GetB()
        {
                 if($this->$b != NULL)
                 {
                    return $this->b;
                 }else
                 {
                     echo $this->ERR_NUM2_2;
                 }
        }

        public function Sum($a, $b)// function for Sum
        {        
            if($a == ERR_NUM1_1)
            {
               return $a;  
            }
            elseif($b == ERR_NUM2_1)
            {
               return $b;  
            }
            else
            {
                return $this->rez = $a + $b; 
            }
                 
                 
                          
        }

        public function Substr($a, $b)// function for Substruction
        {
            if($a == ERR_NUM1_1)
                {
                    return $a;  
                }
            elseif($b == ERR_NUM2_1)
                {
                    return $b;  
                }
            else
                {
                    return $this->rez = $a - $b;
                }      
        }
        


        public function Multiply($a, $b) // function for multiplication
        {
            echo "<br>000  ".$this->getError($a, $b)."<br>  ";
             //{
                 
            // }
            // else
            // {
            //     return $this->rez = $a * $b;
            //}      
                  
        }

        public function Divide($a, $b)// function for Devision
        {
            
            if($b == 0){
                return $b = ERR_NUM2_2;  
            }
            if($a && $b)
                { 
                if($a == ERR_NUM1_1)
                {
                    return $a;  
                }
                else if($b == ERR_NUM2_1)
                {
                    return $b;  
                }
                else
                {
                    return $this->rez = $a / $b;
                }      
            }      
            
        }

        public function getError()
        {
            if($b == 0)
            {
                return $b = ERR_NUM2_2;  
            }
            if($a == 0)
            {
                return $a = ERR_NUM1_2;  
            }
            if($a && $b)
            { 
                if($a == ERR_NUM1_1)
                {
                    return $a;  
                }
                else if($b == ERR_NUM2_1)
                {
                    return $b;  
                }
                else
                {
                    return true;
                }      
            }      
        }

        public function DevideByOne($b)//function for Devision By One
        {
            if($b!=0)
                 { 
                    $this->rez = 1 / $b;
                    print_r("Divide by one is: " . $this->rez . "<br>");
                 } else  
                 echo " Divide by zero  is forbidden, ". ERR_NUM2_2;
                 
        }

        public function SqrRoot($a)//function for Radical
        { 
            if($a);
            {   
                print_r( "Radical is: ".sqrt($a) . "<br>") ;                
            }
        }


        public function percent($a, $b) //function for get percent
        { 
          if ($a && $b)
          {  //echo "<br>".$a, "<br>".$b ;
            $rez= $a / 100 * $b; 
            print_r("Percent is:".$rez . "<br>") ;
          } else 
            return false;
        }

        public function mSave($a)//function for saving nomber in memory
        {
            if($a)
            {
                $this->memVal=$a; 
            }
            else echo"there is not nomber in tme memory!";
            

        }
    
        public function mRead()//function for reading nomber from the memory
        {   
           if($this->memVal) 
           return print_r("number in memory :" .$this->memVal."<br>"); 
           else   echo "there is not nomber in tme memory!";  
        }

        public function mClear()//function for cleaning memory
        {   
            if($this->memVal)
            {
                 $this->memVal=null; print_r("result clear data from memory:" .gettype($this->memVal));  
            }
            
             else   echo "there is not nomber in tme memory!";
        }
        

        public function mPlus()//function writing nomber in memory after addition current number to number from the memory
        {   
            if($this->memVal)
            {
                $rezPlus=$this->memVal+ $this->a;//addition current number to number from the mem
                $this->memVal=$rezPlus; // writing sum to mem
                print_r("result sum from mem " .$this->memVal ."<br>");
            }              
             else   echo "there is not nomber in tme memory!";
        }

        public function mMinus()//function substraction nomber from number in memory
        {   
            if($this->memVal)
            {
                $rezSubst=$this->memVal- $this->a;//substraction current number   from number the mem
                $this->memVal=$rezSubst; // writing rez to mem
                print_r("result substraction from mem " .$this->memVal ."<br>");
            }              
             else   echo "there is not nomber in tme memory!";
        }
    }

        
?>
