<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DOCUMENT-T-1</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="uploadedFile">select file to uploud:</label> <br><br>
        <input type="file" name="uploadedFile"><br><br>
        <input type="submit"  name="submite" value="upload"><br><br>
		<?php 

//checking files for availability 

					if (count($arrFiles) == 0) {
						$noticeError = 'No files exist in the folder';
					}
					
//show information about delete actions
					
					if ($noticeDel) {  
						?>
							<div style="background:yellow; width:50%;">
								<?= $noticeDel; ?>
							</div><br>
						<?php
					}

//show information about errors

					if ($noticeError) {  
						?>
							<div style="background:red; width:50%;">
								<?= $noticeError; ?>
							</div><br>
						<?php
					}

//show information about permission

					if ($noticePerm) {  
						?>
							<div style="background:red; width:50%;">
								<?= $noticePerm; ?>
							</div><br>
						<?php
					}

//show information about successfuliy actions 

					if ($noticeSucc) { // Success 
						?>
							<div style="background:green; width:50%;">
								<?= $noticeSucc; ?>
							</div><br>
						<?php
					}
				?>
    </form>

<!--Show table with php if we have array-->

    <?php if ($arrFiles && gettype($arrFiles) == 'array') { ?>
			<table border="1px solid" style=" border-collapse:collapse; width:50%;">
				<thead >
					<tr>
						<th>№</th>
						<th>File name</th>
						<th>Size</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php

//Fill out data in the the table from array

						forEach($arrFiles as $key => $item){
						?>
							<tr>
								<th><?= $key ?></th>
								<td><?= $item['name']?></td>
								<td><?= $item['size']?></td>
								<td>

<!--Add button for deleting file -->

									<form action="" method="POST">
										<input type="hidden" name="fileName" value="<?= $item['name']?>" >
										<button type="submit" name="delFile" >delete</button>
									</form>
								</td>
							</tr>
						<?php
						}
					?>
				</tbody>
			</table>
	
					<?php }	?>

		</div>
</body>
</html>

