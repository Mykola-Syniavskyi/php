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
<<<<<<< HEAD
		'%ERRORS%'=>'Empty field',
		'%SACCESS%'=>'Your letter was sent, our manager will call you',
=======
		'%ERROR_TEXT%'=>'',
		'%ERROR_NAME%'=>'',
		'%ERROR_EMAIL%'=>'',
		'%ERROR_SELECT%'=>'',
		'%SACCESS%'=>'',
		

>>>>>>> 62cb794db1bd61391ba220c6d9a7a244d816f060
		];
		
		
   }
   	
	public function getArray()

   {	   
		 return $this->placeholders;
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
<<<<<<< HEAD
		<p>From:'.$this->name.'</p>
=======
		<p>From'.$this->name.'</p>
>>>>>>> 62cb794db1bd61391ba220c6d9a7a244d816f060
		<p>'.$this->email.'</p>
		<p>'.$this->text.'</p>
		<p>'.'IP:' .$_SERVER['REMOTE_ADDR'].'</p>
		<p>'.'Date:' .$date. '</p>
		</body>
		</html>';
		//headers
		$headers = 'Content-type: text/html; charset="utf-8"';
		$headers .= "From: <$this->email>"; 
		$headers .= "Reply-To: <$to>"; 
		return mail($to, $subject, $message, $headers); 
	}	
	
	


	public function checkForm()
	{
		if (true == $this->ValidName() && true == $this->validEmail() && true == $this->ValidText())
		{
			return true;
		}return false;
					
	}




	public function validEmail()
    {//print_r($this->email);
        
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
		
		{	
       		return true;
		}
		else
		{
			$this->placeholders['%ERROR_EMAIL%']='incorect email!';
			return false;
		}
         
        
    }

    public function ValidName()
    {
        if (htmlspecialchars(trim(strip_tags(stripslashes($this->name))))) 
        {
        return true;
		}else
		{	if(empty($this->name))
			$this->placeholders['%ERROR_NAME%']='incorect NAME!';
			return false;
		}
        
        
    }
    public function ValidText()
    {
        if (strlen(htmlspecialchars(trim(strip_tags(stripslashes($this->text)))))>10) 
        {
            return true;
		}else
		{
			$this->placeholders['%ERROR_TEXT%']='please fill in more than 10 symbols!';
			return false;
		} 
        
    }
}

