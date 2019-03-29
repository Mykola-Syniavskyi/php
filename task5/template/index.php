<?php
$ses= new SESSION();
if(isset($_POST['data']))
{
    $ses->add( $_POST['data']);
}

?>