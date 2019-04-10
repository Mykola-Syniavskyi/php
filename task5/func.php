<?php
function add(iWorkData $obj, $key, $value)
{
    return $obj->saveData($key, $value);
}
function read(iWorkData $obg, $key)
{
    return $obg->getData($key);
}
function del(iWorkData $obg, $key)
{
    return $obg->deleteData($key);
}
?>