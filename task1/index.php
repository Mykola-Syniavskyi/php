<?php
include 'config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task_php</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
       <br>
 select file to uploud:<br><br>

        <input type="file" name="uploadedFile" id="uploadedFile"><br><br>
        <input type="submit" value="Uploud File" name="submit">
    </form>
<?
include 'templates/index.php';
?>
</body>
</html>

