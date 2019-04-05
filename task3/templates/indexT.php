<?php

include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document-Print</title>
</head>
<body>
    
</body>
</html>
<?

echo "This is the pointed row : ". $printOneRow."<br>";//print selected Row
echo "This is the pointed symbol : ".$printOneSym."<br>";//print selected Symbol
echo "This is all rows in the file : ".$printAllRow."<br>";//Print All Rows in the file
echo "This is content of the saved file : ".$printAllSavedRow."<br>";//Print All Rows in the saved file
echo "This is all symbols in the file : ".$printAllSym."<br>";// Print All Symbols in the file
echo $replaceSym."<br>"; // replace selected Symbol
echo $replaceRow."<br>";//replace selected Row