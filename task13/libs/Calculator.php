<?php
include '../config.php';

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
                return $this->a = $valueA ;    
            }
            else
            {    
                return ERR_1;   
            }
        }

        public function SetB($valueB)
        {//var_dump($valueB);
            if(is_numeric($valueB) && is_int($valueB))  
            {
                return $this->b = $valueB ;
            }
            else
            {    
                return ERR_1;    
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

        public function Sum()// function for Sum
        {      
            if(!is_null($this->a) && !is_null($this->b))
            {   
                
                $rez = $this->GetA() + $this->GetB();
                return $rez;
            }
            else
            {
                return ERR_1;
            }                      
        }

        public function Substr()// function for Substruction
        {
            if(!is_null($this->a) && !is_null($this->b))
            {	
                 $rez = $this->GetA() - $this->GetB();
                return $rez;
            }
            else
            {
                return ERR_1;
            }      
        }
        
        public function Multiply() // function for multiplication
        { //print_r($this->a.$this->b);
            if(!is_null($this->a) && !is_null($this->b))
            {
                return $rez = $this->GetA() * $this->GetB();
            }
            else
            {
                return ERR_1;
            }      
        }
        
        public function Divide()// function for Devision
        {   if($this->b===0)
            {
                return ERR_2;
            }
            if(!is_null($this->a) && !is_null($this->b))
            {   
               return $rez= $this->GetA() / $this->GetB();   
            } 
            else     
            {
                return ERR_1; 
            }          
        }

        public function DevideByOne()//function for Devision By One
        {
            if($this->b===0)
            { //echo "aaa";
                return ERR_2;
            }
            elseif( is_null($this->b))
            {// echo "AAA";
                return  ERR_1;
            } 
            else
            { //echo "CCC";
                return $rez= 1 / $this->GetB();  
            }                  
        }

        public function SqrRoot()//function for Radical
        { 
            if(!is_null($this->a))
            {   
                return sqrt($this->GetA());                
            }
            else
            {
                return  ERR_1;
            }
        }
         

        public function percent() //function for get percent
        { 
          if (!is_null($this->a) && !is_null($this->b))
          { 
            return $rez=  $this->GetA() * $this->GetB()/ 100;            
          } 
          else
          {
            return ERR_1;
          } 
        }

        public function mSave()//function for saving nomber in memory
        {
            if(!is_null($this->a))
            {
               return $this->memVal=$this->GetA(); 
            }
            else 
            {
                return ERR_1;
            }           
        }
    
        public function mRead()//function for reading nomber from the memory
        {   
           if(!is_null($this->memVal)) 
           return $this->memVal; 
           return ERR_1;  
        }

        public function mClear()//function for cleaning memory
        {   
            if($this->memVal)          
                return $this->memVal=null;
                return ERR_1; 
        }
        
        public function mPlus()//function writing nomber in memory after addition current number to number from the memory
        {   
            if($this->memVal)
            {
                $rezPlus=$this->memVal+ $this->GetA(); //addition current number to number from the mem
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
                $rezSubst=$this->memVal- $this->GetA();//substraction current number   from number the mem
                $this->memVal=$rezSubst; // writing rez to mem
                return $this->memVal;
            }              
            else
            {
                return ERR_3; 
            }   
        }
}        

