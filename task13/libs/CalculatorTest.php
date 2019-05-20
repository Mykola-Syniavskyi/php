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
        $a=$this->calculator->setA(1);
        $b=$this->calculator->setB(2);

        $result = $this->calculator->Sum($a, $b);
        $this->assertEquals(3, $result);
    }




    public function testMinus()
    {
        $a=$this->calculator->setA(1);
        $b=$this->calculator->setB(2);

        $result = $this->calculator->Substr($a, $b);
        $this->assertEquals(-1, $result);
    }




    public function testMultiply()
    {
        $a=$this->calculator->setA(2);
        $b=$this->calculator->setB(2);

        $result = $this->calculator->Multiply($a, $b);
        $this->assertEquals(4, $result);
    }
 



    public function testDivide()
    {
        $a=$this->calculator->setA(2);
        $b=$this->calculator->setB(2);

        $result = $this->calculator->Divide($a, $b);
        $this->assertEquals(1, $result);
    }






    public function testDevideByOne()
    {
        $b=$this->calculator->setB(6);

        $result = $this->calculator->DevideByOne($b);
        $this->assertEquals(0.17, round( $result,2));
    }




    public function testSqrRoot()
    {
        $a=$this->calculator->setA(2);
       
        $result = $this->calculator->SqrRoot($a);
        $this->assertEquals(1.41, round( $result,2));
    }





    public function testpercent()
    {
        $a=$this->calculator->setA(100);
        $b=$this->calculator->setB(5);
       
        $result = $this->calculator->percent($a,$b);
        $this->assertEquals(5,  $result);
    }






    public function testmSave()
    {
        $a=$this->calculator->setA(5);
       
        $result = $this->calculator->mSave($a);
        $this->assertEquals(5, $result);
    }




    public function testmRead()
    {
        $a=$this->calculator->setA(6);
        $this->calculator->mSave($a);
        $result = $this->calculator->mRead();
        $this->assertEquals(6, $result);
    }
    




    public function testmClear()
    {
        $a=$this->calculator->setA(6);
        $this->calculator->mSave($a);
        $result = $this->calculator->mClear();
        $this->assertEquals(null, $result);
    }


    

    public function testmPlus()
    {
        $a=$this->calculator->setA(6);
        $this->calculator->mSave($a);
        $result = $this->calculator->mPlus();
        $this->assertEquals(12, $result);
    }
    



    public function testmMinus()
    {
        $a=$this->calculator->setA(6);
        $this->calculator->mSave($a);
        $this->calculator->setA(5);
        $result = $this->calculator->mMinus();
        $this->assertEquals(1, $result);
    }



    
    
}