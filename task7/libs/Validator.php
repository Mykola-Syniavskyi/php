<?php

class Validator
{
    public function validEmail($email)
    {
        $email_1 = $email;
        if (filter_var($email_1, FILTER_VALIDATE_EMAIL)) 
        {
        return true;
        }else
        {
        return false;
        }
    }

    public function ValidName($name)
    {
        $name_1 = $name;
        if (htmlspecialchars(trim($name_1))) 
        {
        return true;
        }else
        {
        return false;
        }
    }
    public function ValidText($text)
    {
        $text_1 = $text;
        if ($text_1) 
        {
        echo "!!!";
        }else
        {
            echo "???"; return false;
        }
    }
}