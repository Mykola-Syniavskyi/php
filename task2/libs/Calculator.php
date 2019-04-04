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
            if(is_numeric($valueA) && is_int($valueA)) 
                { 
                    $this->a = $valueA ; 
                }else
                {    
                    $this->a = 0;    
                }
        }

        public function SetB($valueB)
        {
            if(is_numeric($valueB) && is_int($valueB))  
                {
                     $this->b = $valueB ; 
                }
                else
                {    
                    $this->b =0;    
                }
        }
            
        public function GetA()
        {
                return $this->a;
        }

        public function GetB()
        {
                return $this->b;
        }

        public function Sum($a, $b)// function for Sum
        {      
            if(is_int($a) && is_int($b))
            {   
                $this->SetA($a);
                $this->SetB($b);
                $rez = $this->GetA() + $this->GetB();
                return $rez;
            }
            else
            {
                return ERR_1;
            }                      
        }

        public function Substr($a, $b)// function for Substruction
        {
            if(is_int($a) && is_int($b))
            {
                return $this->rez = $a - $b;
            }
            else
            {
                return ERR_1;
            }      
        }
        
        public function Multiply($a, $b) // function for multiplication
        {
            if(is_int($a) && is_int($b))
            {
                return $this->rez = $a * $b;
            }
            else
            {
                return ERR_1;
            }      
        }
        
        public function Divide($a, $b)// function for Devision
        {   if($b==0)
            {
                return ERR_2;
            }
            if( is_int($a) &&  is_int($b))
            {   
               return $this->rez=  $a / $b;      
            } 
            else     
            {
                return ERR_1; 
            }          
        }

        public function DevideByOne($b)//function for Devision By One
        {
            if($b==0)
            {
                return ERR_2;
            }
            elseif(  !is_int($b))
            { 
                return  ERR_1;
            } 
            else
            {
                return $this->rez= 1 / $b;
            }                  
        }

        public function SqrRoot($a)//function for Radical
        { 
            if(is_int($a))
            {   
                return sqrt($a);                
            }
            else
            {
                return  ERR_1;
            }
        }

        public function percent($a, $b) //function for get percent
        { 
          if (is_int($a) && is_int($b))
          { 
            return $rez=  $b * $a / 100;            
          } 
          else
          {
            return ERR_1;
          } 
        }

        public function mSave($a)//function for saving nomber in memory
        {
            if(is_int($a))
            {
                $this->memVal=$a; 
            }
            else 
            {
                return ERR_1;
            }           
        }
    
        public function mRead()//function for reading nomber from the memory
        {   
           if($this->memVal) 
           return $this->memVal; 
           return ERR_3;  
        }

        public function mClear()//function for cleaning memory
        {   
            if($this->memVal)          
                return $this->memVal=null;
                return "clear_ERROR"; 
        }
        
        public function mPlus()//function writing nomber in memory after addition current number to number from the memory
        {   
            if($this->memVal)
            {
                $rezPlus=$this->memVal+ $this->a;//addition current number to number from the mem
                $this->memVal=$rezPlus; // writing sum to mem
                 return $this->memVal ;
            }              
             else
            {
                return ERR_3; 
            }   
        }

        public function mMinus()//function substraction nomber from number in memory
        {   
            if($this->memVal)
            {
                $rezSubst=$this->memVal- $this->a;//substraction current number   from number the mem
                $this->memVal=$rezSubst; // writing rez to mem
                return $this->memVal;
            }              
            else
            {
                return ERR_3; 
            }   
        }
}        
?>
