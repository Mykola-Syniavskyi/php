<?php 

class Model
{ 

   public function __construct()
   {  
		$this->name=$_POST['name'];
		$this->email=$_POST['email'];
		$this->select=$_POST['select'];
		$this->text=$_POST['text'];
		$this->placeholders=[
		'%TITLE%'=>'Contact Form',
		'%ERRORS%'=>'Empty field',
		'%SACCESS%'=>'Your letter was sent, our manager will call you',

		];
		
		
   }
   	
	public function getArray()
   {	   
		 return 	$this->placeholders;
   }
	
	public function checkForm()
	{
		if (true == $this->ValidName() && true == $this->validEmail() && true == $this->ValidText())
	 
		return true;			
	}
    
	public function sendEmail()
	{
		$date = date("Y-m-d H:i:s");
		//email на который отправляем
		$to = MAIL_TO;
		//тема сообщения
		$subject = $this->select;
		//как бы текст
		$message = '<!DOCTYPE html>
		<html>
		<head>
		<meta charset="utf-8">
		<head>
		<body>
		<p>'.$this->text.'</p>
		<p>'.'IP:' .$_SERVER['REMOTE_ADDR'].'</p>
		<p>'.'Date:' .$date. '</p>
		</body>
		</html>';
		//headers
		$headers = 'Content-type: text/html; charset="utf-8"';
		$headers .= "From: <$this->email>"; 
		$headers .= "Reply-To: <$to>"; 
		return mail(MAIL_TO, $subject, $message, $headers); 
	}	
	
	

	public function validEmail()
    {//print_r($this->email);
        
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
        {echo 'T';
        return true;
        }echo 'F';
        return false;
        
    }

    public function ValidName()
    {
        if (htmlspecialchars(trim($this->name))) 
        {echo 'T';
        return true;
        }echo 'F';
        return false;
        
    }
    public function ValidText()
    {
        if (strlen(htmlspecialchars(trim($this->text)))>3) 
        {echo 'T';
            return true;
        }echo 'F'; return false;
        
    }
}

