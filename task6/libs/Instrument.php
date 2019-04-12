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


    public function setName ($N)
    {   
        if (is_string($N))
        {
             $this->nameInst=trim($N);
             return true;
        }
        return false;      
    }


    public function setCategory ($C)
    {
        if (is_string($N))
        {
             $this->categInst=trim($C);
             return true;
        }
        return false;  
    }


    public function getName ()
    {
        return $this->nameInst;
    }

    
    
    public function getCategory ()
    {
        return $this->categInst;
    }
}