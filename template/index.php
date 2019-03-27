<?php
if (isset($_POST))
{
    print_r($_POST);
}

$combine= new SQL;
if($_POST['sql'])
{
  echo  $combine->select();
}
