<?php
include'config.php';
include 'function.php';
 uploadFiles();
$array=$_FILES['uploadedFile']; //d($array);
if(!count($files)) {echo "table is empty!";}?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>number</th>
	<th>name</th>
	<th>size</th>
	<th>delete</th>
</tr>

<? foreach($array as $item) : ?>
<table>
<tr>
<td><?=$item['name'];?></td>
<td><?=$item['size'];?></td>
</tr>
<?php endforeach; ?>
</table>

