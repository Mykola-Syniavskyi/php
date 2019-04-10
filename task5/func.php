<?php
function add(iWorkData $obj, $key, $value)
{
    return $obj->saveData($key, $value);
}


function read(iWorkData $obj, $key)
{
    return $obj->getData($key);
}


function del(iWorkData $obj, $key)
{
    return $obj->deleteData($key);
}
?>