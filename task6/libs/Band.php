<?php
class Band implements iBand
{
    protected $bandName;
    protected $genre;
    protected $musician;
    protected $instrument;
    protected $category;


    public function __construct()
    {
        $this->bandName="";
        $this->genre="";
        $this->musician=[];
        $this->instrument=[];
        $this->category=[];
    }


//*************SET NAME FOR BAND

    public function setName($name)
    {
        if (is_string($name))
        {
            $this->bandName=trim($name);
            return true;
        }
        return false;
    }




//*************SET GENRE FOR BAND

    public function setGenre($genre)
    {
        if (is_string($genre))
        {
            $this->genre=trim($genre);
            return true;
        }
        return false;
    }




//*************ADD MUSICIAN, INSTRUMENT, CATEGORY OF INSTRUMENT FOR BAND


    public function addMusician(iMusician $obj)
    {   
        if ($obj)
        {
            array_push($this->musician,$obj->getMusicianType()); 
            array_push($this->instrument,$obj->getInstrument()); 
            array_push($this->category,$obj->getCategoryInst());             
            return true;
        }
        return false;
    }



//****************GETERS

    public function getMusician()
    {
        return $this->musician;
    }




     public function Insrument()
    {
        return $this->instrument;
    }





    public function categoryInstr()
    {
        return $this->category;
    }



    public function getName()
    {
        return $this->bandName;
    }


    public function getGenre()
    {
        return $this->genre;
    }
}