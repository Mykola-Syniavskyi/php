<?php

class Controller
{
		private $model;
		private $view;
		

		public function __construct()
		{		
		    $this->model = new Model();
			$this->view = new View(TEMPLATE);	
				
			if(isset($_POST['email']))
			{	
				$this->pageSendMail();
			}
			else
			{
				$this->pageDefault();	
			}
			
			$this->view->templateRender();			
	    }	
		



		private function pageSendMail()
		{
			if($this->model->checkForm() === true)
			{
				
				$this->model->sent=$this->model->sendEmail();
				$this->model->showRez();
			}
			$mArray = $this->model->getArray();	//print_r($mArray);	
	        $this->view->addToReplace($mArray);	
		}	
			 
		


		private function pageDefault()
		{   
		   $mArray = $this->model->getArray();		
		   $this->view->addToReplace($mArray);		
		}	
		
		
}
