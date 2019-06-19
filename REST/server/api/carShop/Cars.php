<?php
include 'restServer.php';
class Cars extends restServer
{
    
    

    public function getInfo()
    {
    //    echo $_SERVER['REQUEST_METHOD'];
        // echo $_SERVER['REQUEST_URI'];
    }
}






// switch($this->method)
// {
//      case 'GET':
//          $this->setMethod('get'.ucfirst($table), explode('/', $path));
//          break;
//      case 'DELETE':
//          $this->setMethod('delete'.ucfirst($table), explode('/', $path));
//          break;
//      case 'POST':
//          $this->setMethod('post'.ucfirst($table), explode('/', $path));
//          break;
//      case 'PUT':
//          $this->setMethod('put'.ucfirst($table), explode('/', $path));
//          break;
//      default:
//          return false;
// }



// function setMethod($method, $param=false)
// {
//      if ( method_exists($this, $method) )
//      {
//          call_user_func(......);
//      }
// }

$obj = new Cars();
$obj->parsUrl();