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
		'%ERROR_TEXT%'=>'',
		'%ERROR_NAME%'=>'',
		'%ERROR_EMAIL%'=>'',
		'%ERROR_SELECT%'=>'',
		'%TEXT%'=>$this->text,
		'%NAME%'=>$this->name,
		'%EMAIL%'=>$this->email,
		'%OPTION_1%'=>$this->select,
		'%OPTION_2%'=>$this->select,
		'%OPTION_1%'=>$this->select
		
	
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
		<p>From : '.$this->name.'</p>
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
	
	public function info()
	{
		if (true==sendEmail())
		{
			 $this->placeholders['%SACCESS%'];
			 $this-> Clear();
			 return true;
		}return false;
	}


	public function checkForm()
	{
		if (true == $this->ValidName() && true == $this->validEmail() && true == $this->ValidText())
		{
			
			return true;
		}
		return false;
					
	}




	public function ValidName()
    {
        if (htmlspecialchars(trim(strip_tags(stripslashes($this->name))))) 
        {
			$this->placeholders['%NAME%'];
        	return true;
		}else
		{	if(empty($this->name))
			$this->placeholders['%ERROR_NAME%']='incorect NAME!';
			return false;
		}
	}



	public function validEmail()
    {        
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) || !empty($this->email)) 
		
		{	
			$this->placeholders['%EMAIL%'];
       		return true;
		}
		else
		{	 
			$this->placeholders['%ERROR_EMAIL%']='incorect email!';
			return false;
		}
         
        
    }

    
		
	


	public function ValidSelect()
    {




        if ($this->select) 
        {
			$this->placeholders['%ERROR_SELECT%']='incorect subject!';
			return false;
			
		}else
		{	//if(empty($this->name))
			$this->placeholders['%SELECT%'];
        	return true;
		}
        
	}
	



    public function ValidText()
    {
        if (strlen(htmlspecialchars(trim(strip_tags(stripslashes($this->text)))))>10) 
        {
			$this->placeholders['%TEXT%'];
			return true;
		}else
		{
			$this->placeholders['%ERROR_TEXT%']='please fill in more than 10 symbols!';
			return false;
		} 
        
	}
	public function Clear()
	{
		$this->name='';
		$this->email='';
		$this->select='';
		$this->text='';

	}
}

