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



//LET`S BEGIN
$combine= new MYSQL;

// //******$COLUMNS FOR SELECT WITH JOIN****** */

// $columns=$combine->setColumns('students.FirstName')->setColumns('students.LastName')->setColumns('students.Age')->setColumns('sex.Sex')->getColumns();
// $select=$combine->select($columns)->from('students')->rightJoin('sex','students.id=sex.id')->toStringSelect();



// //*****$COLUMNS FOR SELECT WITH OUT JOIN */

// $columns=$combine->setColumns('students.FirstName')->setColumns('students.LastName')->setColumns('students.Age')->getColumns();
// $order=$combine->setOrder('id ASC')->getOrder();
// $group=$combine->setGroupBy('FirstName')->getGroupBy();
// $select=$combine->select($columns)->from('students')->where('id>','1')->group($group)->having('SUM(Age)<','30')->limit(10)->toStringSelect();


 
// // //INSERT 

// $combine->insert('students',array('FirstName'=>'Olena','LastName'=>'Tashkova','Age'=>'25' ));





// // UPDATE

//$combine->update('students',array('FirstName'=>'Dmytro','LastName'=>'Tashkov'))->where('id=',7)->toStringUpdate();





// // DELETE :  

// $combine->delete('students')->where('id=',7)->toStringDelete();







//------POSTGRESQL------


 $combinePg= new PostgreSQL;
 $selectPg=$combinePg->connect();

// //******$COLUMNS FOR SELECT WITH JOIN****** */

// $columns=$combinePg->setColumns('students.FirstName')->setColumns('students.LastName')->setColumns('students.Age')->setColumns('sex.Sex')->getColumns();
// $select=$combinePg->select($columns)->from('students')->rightJoin('sex','students.id=sex.id')->toStringSelect();



// //*****$COLUMNS FOR SELECT WITH OUT JOIN */

// $columns=$combinePg->setColumns('students.FirstName')->setColumns('students.LastName')->setColumns('students.Age')->getColumns();
// $order=$combinePg->setOrder('id ASC')->getOrder();
// $group=$combinePg->setGroupBy('FirstName')->getGroupBy();
// $select=$combinePg->select($columns)->from('students')->where('id>','1')->group($group)->having('SUM(Age)<','30')->limit(10)->toStringSelect();


 
// // INSERT 

// $combinePg->insert('students',array('FirstName'=>'Olena','LastName'=>'Tashkova','Age'=>'25' ));





// // UPDATE

//$combine->update('students',array('FirstName'=>'Dmytro','LastName'=>'Tashkov'))->where('id=',7)->toStringUpdate();





// // DELETE :  

// $combine->delete('students')->where('id=',7)->toStringDelete();


include ('template/indexT.php');
