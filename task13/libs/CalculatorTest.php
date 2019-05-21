<?php
require 'Calculator.php';
 
class CalculatorTest extends PHPUnit_Framework_TestCase
{
    private $calculator;
 
    protected function setUp()
    {
        $this->calculator = new Calculator();
    }
 
    protected function tearDown()
    {
        $this->calculator = NULL;
    }
 



    public function testAdd()
    {
        $a=$this->calculator->SetA(1);
        $b=$this->calculator->SetB(2);
        $result = $this->calculator->Sum();
        $this->assertEquals(3, $result);
    }




    public function testMinus()
    {
        $a=$this->calculator->SetA(5);
        $b=$this->calculator->SetB(0);
        $result = $this->calculator->Substr();
        $this->assertEquals(5, $result);
    }




    public function testMultiply()
    {
        $a=$this->calculator->SetA(2);
        $b=$this->calculator->SetB(2);
        $result = $this->calculator->Multiply();
        $this->assertEquals(4, $result);
    }
 



    public function testDivide()
    {
        $a=$this->calculator->SetA(2);
        $b=$this->calculator->SetB(2);
        $result = $this->calculator->Divide();
        $this->assertEquals(1, $result);
    }






    public function testDevideByOne()
    {   
        $this->calculator->SetB(1);
        $result = $this->calculator->DevideByOne();
        $this->assertEquals(1/$this->calculator->GETB(),  $result);
    }




    public function testSqrRoot()
    {
        $a=$this->calculator->SetA(2);      
        $result = $this->calculator->SqrRoot();
        $this->assertEquals(sqrt($this->calculator->GetA()),  $result);
    }





    public function testpercent()
    {
        $a=$this->calculator->SetA(100);
        $b=$this->calculator->SetB(5);
        $result = $this->calculator->percent();
        $this->assertEquals(5,  $result);
    }






    public function testmSave()
    {
        $this->calculator->SetA(5);  
        $result = $this->calculator->mSave();
        $this->assertEquals(5, $result);
    }




    public function testmRead()
    {
        $this->calculator->setA(6);
        $this->calculator->mSave();
        $result = $this->calculator->mRead();
        $this->assertEquals(6, $result);
    }
    




    public function testmClear()
    {
         $this->calculator->setA(6);
         $this->calculator->mSave();
        $result = $this->calculator->mClear();
        $this->assertEquals(null, $result);
    }


    

    public function testmPlus()
    {
        $this->calculator->setA(6);
        $this->calculator->mSave();
        $this->calculator->setA(7);
        $result = $this->calculator->mPlus();
        $this->assertEquals(13, $result);
    }
    



    public function testmMinus()
    {
        $a=$this->calculator->setA(6);
        $this->calculator->mSave();
        $this->calculator->setA(5);
        $result = $this->calculator->mMinus();
        $this->assertEquals(1, $result);
    }



    
    
}