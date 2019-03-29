<?php
function add(iWorkData $ses)
{
    if($ses)
    {
        $ses->add();
        if($ses->add())
        return true;
    }
    else
    {
        echo "$ses is not obj!";
    }
    
}
function read(iWorkData $ses)
{
    if($ses)
    {
        $ses->read();
        if($ses->read())
        return true;
    }
    else
    {
        echo "$ses is not obj!";
    }
}
function del(iWorkData $ses)
{
    if($ses)
    {
        $ses->del();
        if($ses->del())
        return true;
    }
    else
    {
        echo "$ses is not obj!";
    }
}
?>