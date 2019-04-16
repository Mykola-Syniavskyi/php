<?php
class Instrument implements iInstrument
{
    protected $nameInst;
    protected $categInst;
    public function __construct ()
    {
        $this->nameInst=' ';
        $this->categInst=' ';

    }


    //**********SET NAME INSTRUMENT

    public function setName ($name)
    {   
        if (is_string($name))
        {
             $this->nameInst=trim($name);
             return true;
        }
        return false;      
    }



    //**********SET TYPE INSTRUMENT

    public function setCategory ($category)
    {
        if (is_string($category))
        {
             $this->categInst=trim($category);
             return true;
        }
        return false;  
    }



    //****** GETERS FOR NAME AND CATEGORY

    public function getName ()
    {
        return $this->nameInst;
    }

    
    
    public function getCategory ()
    {
        return $this->categInst;
    }
}