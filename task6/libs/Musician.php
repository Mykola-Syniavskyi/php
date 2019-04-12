<?php
class Musician implements iMusician
{
    protected $instrument;
    protected $type;
    protected $musicman;

   
    public function __construct()
    {
        $this->instrument= ' ';
        $this->type= ' ';
        $this->musicMan= ' ';
    }

    

    public function setMusicMan($t,$m)
    {
        if(is_string($t) && is_string($m))
        {
            $this->type=trim($t);
            $this->musicMan=trim($m);
            return true;
        }
        return false;
    }



    
    public function addInstrument(iInstrument $obj)
    {
        
        $this->instrument=$obj;
    }



     public function getInstrument()
     {
        return $this->insrument;
     }



     public function assingToBand(iBand $nameBand)
     {

     }


     
     public function getMusicianType()
     {
        return $this->type;
     }
}