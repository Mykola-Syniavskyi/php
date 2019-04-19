<?php 

class Model
{ 

   public function __construct()
   {  
		$this->name=$_POST['name'];
		$this->email=$_POST['email'];
		$this->select=$_POST['select'];
		$this->text=$_POST['text'];
		$this->placeholders=
			[
			'%TITLE%'=>'Contact Form',
			'%ERRORS%'=>'Empty field',
			'%SELECT_PHP%'=>'php',
			'%SELECT_JS%'=>'js',
			'%PROMPT_TEXT%'=>'please type in more than 10 symbols!',
			'%SACCESS%'=>'',
			'%ERROR_TEXT%'=>'',
			'%ERROR_NAME%'=>'',
			'%ERROR_EMAIL%'=>'',
			'%ERROR_SELECT%'=>'',
			'%TEXT%'=>$this->text,
			'%NAME%'=>$this->name,
			'%EMAIL%'=>$this->email,
			'%SELECT%'=>$this->select,
			'%SELECTED_PHP%'=>'',
			'%SELECTED_JS%'=>''			
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
	



/////////////SHOW SACCESS NOTICE ABOUT SENDING

	public function showRez()
	{
		if (true == $this->sendEmail())
		{
			 $this->placeholders['%SACCESS%']='LETTER WAS SENT SACCESFULLY';
			 $this-> Clear();
			 return true;
		}return false;
	}








	public function checkForm()
	{
		if (true == $this->ValidSelect() && true == $this->ValidName() && true == $this->validEmail() && true == $this->ValidText() )
		{			
			return true;
		}
		return false;
					
	}





////////////////CHECK NAME 

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





////////////////////CHECK EMAIL

	public function validEmail()
    {        
        if (false == filter_var($this->email, FILTER_VALIDATE_EMAIL) || empty($this->email)) 
		
		{	$this->placeholders['%ERROR_EMAIL%']='incorect email!';
			return false;
			
		}
		else
		{	 
			$this->placeholders['%EMAIL%'];
       		return true;
		}       
    }

    
		
	

/////////////////////CHECK SELECT

	public function ValidSelect()
    {
		if ($this->placeholders['%SELECT%'] =='php')
		{
			$this->placeholders['%SELECTED_PHP%']='selected';
			return true;
		}
		elseif($this->placeholders['%SELECT%'] =='js')
		{
			$this->placeholders['%SELECTED_JS%']='selected';
			return true;
		}
		else{
			$this->placeholders['%ERROR_SELECT%']='select subject!';
			return false;
		}
	}


	


//////////////////CHECK TEXTAREA


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




////////////////CLEARING DATA FROM FORM 


	public function Clear()
	{	if (true == $this->sendEmail())
		{
			$this->placeholders['%NAME%']='';
			$this->placeholders['%EMAIL%']='';
			$this->placeholders['%SELECT%'] ='';
			$this->placeholders['%TEXT%']='';
			$this->placeholders['%SELECTED_PHP%']='';
			$this->placeholders['%SELECTED_JS%']='';
			$_POST=[];
		return true;
		}return false;	
	}
}

