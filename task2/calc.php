<?php
class calc
    {
        private $a;
        private $b;
        public function __construct($a,$b) {
            $this->a =0;
            $this->b =0;}
        
        public function setA($a)
            {
              $this->a = int($a);  
            }

        public function getA($a)
            {
              $this->a = int($a);  
            }

        public function setB($b)
            {
              $this->b = int($b);  
            }
        public function getB($b)
            {
              $this->b = int($b);  
            }
    }

