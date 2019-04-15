<?php
class Band implements iBand
{
    protected $bandName;
    protected $genre;
    protected $musician;
    protected $instrument;

    public function __construct()
    {
        $this->bandName=" ";
        $this->genre=" ";
        $this->musician=[];
        $this->instrument=[];
    }


    public function setName($name)
    {
        if (is_string($name))
        {
            $this->bandName=trim($name);
            return true;
        }
        return false;
    }
    public function getName()
    {
        return $this->bandName;
    }


    public function setGenre($genre)
    {
        if (is_string($genre))
        {
            $this->genre=trim($genre);
            return true;
        }
        return false;
    }

    public function getGenre()
    {
        return $this->genre;
    }



    public function addMusician(iMusician $obj)
    {   //print_r($obj);
        if ($obj)
        {
            array_push($this->musician,$obj->getMusicianType()); //print_r( $this->musician) ;//->getMusicianType();
            return true;
        }
        return false;
    }



    public function getMusician()
    {
        return $this->musician;
    }



    public function Insrument($obj)
    {
        return $this->instrument=$obj->getInstrument;
    }

}