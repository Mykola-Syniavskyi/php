<?php
include ('sql.php');
include ('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>INSERT FORM</h3>
<form action="" method="post">
tableName: <input type="text" name="name" placeholder="students"><br><br>
insert: ( <input type="text" name="fild_1"  placeholder="FirstName,LastName"> )VALUES
( <input type="text" name="fild_2" placeholder="'Sergei', 'Kobelia'"> )<br><br>
condition: <input type="text" name="where"><br><br>
<input type="submit" value="Отправить" name="sql">
</form>



<?php
include ('template/index.php');
?>
</body>
</html>