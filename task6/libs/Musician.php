<?php
class Musician implements iMusician
{
    private $instrument;
    private $category;
    private $type;
    

   
    public function __construct()
    {
        $this->instrument= ' ';
        $this->instrument= ' ';
        $this->category= ' ';
        
    }

    

    public function setMusician($type)
    {
        if(is_string($type) )
        {
            $this->type=trim($type);
            return true;
        }
        return false;
    }



    
    public function addInstrument(iInstrument $obj)
    {//print_r($obj);
        if($obj)
        {
            $this->instrument=$obj->getName();
            return true;
        }
        return false;
    }



     public function getInstrument()
     {
        return $this->instrument;
     }



     public function assingToBand(iBand $nameBand)
     {
        if (is_object($nameBand))
        {   

            $nameBand->addMusician($this);
        }

     }


     
     public function getMusicianType()
     {
        return $this->type;
     }
}