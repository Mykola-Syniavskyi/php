<?php
include ('libs/MYSQL.php');
include ('libs/PostgreSQL.php');

//---------------MYSQL--------------

//parameters for SELECT


//**** *CONSTRUCTOR:

//select($columns)  
//selectDistinct($columns) 
//from('students') 
//where('id=','1')
//having('id>','1')
//group($group)                                      
//order($order)
//limit(1)
//rightJoin('sex','students.id=sex.id')
//leftJoin('sex','students.id=sex.id')
//Join('sex','students.id=sex.id')
//crossJoin('sex')
//naturalJoin('sex')
// toStringSelect();



// LET`S BEGIN
$combine= new MYSQL;

//******$COLUMNS FOR SELECT WITH JOIN****** */

$columns=$combine->setColumns('  ')->setColumns('students.LastName')->setColumns('students.Age')->setColumns('sex.Sex')->getColumns();


$select=$combine->select($columns)->from('students')->rightJoin('sex','students.id=sex.id')->toStringSelect();
$errors=$combine->getErrors();

// // //*****$COLUMNS FOR SELECT WITH OUT JOIN */

// $columns=$combine->setColumns('students.FirstName')->setColumns('students.LastName')->setColumns('students.Age')->getColumns();
// $order=$combine->setOrder('id ASC')->getOrder();
// $group=$combine->setGroupBy('FirstName')->setGroupBy('LastName')->setGroupBy('id')->getGroupBy();
// $select=$combine->select($columns)->from('students')->where('id>','1')->group($group)->having('SUM(Age)<','30')->limit(10)->toStringSelect();


 
// //INSERT 

// $combine->insert('students',array('FirstName'=>'Egen','LastName'=>'Kahhov','Age'=>'37' ));
// $combine->insert('sex',array('Sex'=>'Male' ));




// // UPDATE

//$combine->update('students',array('FirstName'=>'Dmytro','LastName'=>'Tashkov'))->where('id=',7)->toStringUpdate();





// // DELETE :  

// $combine->delete('students')->where('id=',7)->toStringDelete();







//------POSTGRESQL------



//**** *CONSTRUCTOR:

//select($columns)  
//selectDistinct($columns) 
//from('students') 
//where('id=','1')
//having('id>','1')
//group($group)                                      
//order($order)
//limit(1)
//rightJoin('sex','students.id=sex.id')
//leftJoin('sex','students.id=sex.id')
//Join('sex','students.id=sex.id')
//crossJoin('sex')
//naturalJoin('sex')
// toStringSelect();


// $combinePg= new PostgreSQL;


// //******$COLUMNS FOR SELECT WITH JOIN****** */

//  $columns=$combinePg->setColumns('students.FirstName')->setColumns('students.LastName')->setColumns('students.Age')->setColumns('sex.Sex')->getColumns();
//  $selectPg=$combinePg->select($columns)->from('students')->rightJoin('sex','students.id=sex.id')->toStringSelect();



// //*****$COLUMNS FOR SELECT WITH OUT JOIN */

// $columns=$combinePg->setColumns('students.FirstName')->setColumns('students.LastName')->setColumns('students.Age')->getColumns();
// $order=$combinePg->setOrder('id ASC')->getOrder();
// $group=$combinePg->setGroupBy('FirstName')->setGroupBy('LastName')->setGroupBy('id')->getGroupBy();
// $selectPg=$combinePg->select($columns)->from('students')->where('id>','1')->group($group)->having('SUM(Age)>','30')->limit(10)->toStringSelect();

 
// // // INSERT 

// $combinePg->insert('students',array('FirstName'=>'Egenei','LastName'=>'Kallnov','Age'=>'30' ));
 //$combinePg->insert('sex',array('Sex'=>'Male'));





// // UPDATE

// $combinePg->update('students',array('FirstName'=>'Dmytro','LastName'=>'Tashkov'))->where('id=',4)->toStringUpdate();





// //DELETE :  

// $combinePg->delete('students')->where('id=',5)->toStringDelete();


include ('template/indexT.php');
