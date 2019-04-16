<?php
class Musician implements iMusician
{
    protected $instrument;
    protected $category;
    protected $type;
    

   
    public function __construct()
    {
        $this->instrument= "";      
        $this->category= "";
        $this->type= "";
    }

    
//*********SET MUSICIANS 

    public function setMusician($type)
    {
        if(is_string($type) )
        {
            $this->type=trim($type);
            return true;
        }
        return false;
    }



//*********ADD NAME OF THE INSTRUMENT AND CATEGORY 

    public function addInstrument(iInstrument $obj)
    {
        if($obj)
        {
            $this->instrument=$obj->getName();
            $this->category=$obj->getCategory();
            return true;
        }
        return false;
    }



//********GETERS FOR INSTRUMENTS AND CATEGORY

     public function getInstrument()
     {
        return $this->instrument;
     }


     public function getCategoryInst()
     {
        return $this->category;
     }


//***********ADD MUSICIANS TO BAND 

     public function assingToBand(iBand $nameBand)
     {
        if (is_object($nameBand))
        {   
            $nameBand->addMusician($this);
        }
     }


//************GETER FOR TYPE MUSiCIAN 

     public function getMusicianType()
     {
        return $this->type;
     }
}