<?php
include 'config.php';

//function for upload files 
function uploadFile($pathToDir)
{
	//make variables globally
    global $noticeSucc;  
    global $noticeError;
    
    //check for permission
  if (!permCheck()) 
  {
    global $noticePerm;
    return $noticePerm = 'permission denied';
  }  

    //create associative array  $fileName
    $fileName = $_FILES['uploadedFile']['name'];
    $fileTempName = $_FILES['uploadedFile']['tmp_name'];
    $uploadFile = $pathToDir . basename($fileName);
    // checking permitted filesize

    try
    {
      if ($_FILES['uploadedFile']['size'] > 2000000) 
      {
      throw new RuntimeException('Exceeded filesize limit.');
      }
      }
      catch (RuntimeException $e) 
      {

       echo $noticeError=$e->getMessage();
       return false;

      }
  
    // checking files to prevent double upload 
    if (file_exists($uploadFile)) 
    {
      return $noticeError = "File $fileName is exist";
    } 
  
    // checking files for uploading and moving file to specified place
   if (is_uploaded_file($fileTempName)) 
    {
      if (move_uploaded_file($fileTempName, $uploadFile)) 
      {// set rights for files
        
        chmod($uploadFile, 0777);
      }
      return $noticeSucc = 'File was uploaded!';
    }

}
    
//function for deleting files 
  function deleteFile($fileName, $PathTodir) 
  {
    //make variables globally
    global $noticeDel;
    global $noticeError;

    //check for permission
    if (!permCheck()) 
    {
    global $noticePerm;
    return $noticePerm = 'permission denied';
    }

    //get full path
    $fileFullPath = $PathTodir . $fileName; 

    //check for existing file
    if (file_exists($fileFullPath)) {

      //deleting
      if (unlink($fileFullPath)) {
        return $noticeDel = "File $fileName was deleted";
      } else {
        return $noticeError = 'Something was wrong';
      }
    } else {
      return $noticeError = "File $fileName is not exist";
    }
  }

//get size of the file
function showTable($pathToDir)
{ //check for permission
  if (!permCheck()) 
  {
    global $noticePerm;
    return $noticePerm = 'permission denied';
  }

  //get list of the files
	$filesList = scandir($pathToDir); 
	$arrFiles = [];
	$arrayId = 0;
	foreach($filesList as $item) {
    if (!in_array($item,array('.','..'))) 
    {
			$fileFullPath = $pathToDir . $item;
			$fileSize = filesize($fileFullPath);
			$arrayId++; //add array id
			$arrFiles[$arrayId] = ['name' => $item, 'size' => resizingFunc($fileSize)];
		}
	}
	return $arrFiles;
}

function resizingFunc($size) 
{
    if ($size > 1048576) 
    { //  mb
        $finalVal = number_format($size / 1048576, 2);
        return $finalVal . ' mb';
    }
    if ($size > 1024) 
    { //  kb
	  	  return $finalVal = number_format($size / 1024, 2) . ' kb';
	  }
	  return $size . ' b';
}

//Checking permission
function permCheck() 
{
	$dirPerm = substr(fileperms(DIR_PATH), -3);
  if (intval($dirPerm[2]) < 5) 
  {
		return false;
	} else {
		return true;
	}
}
?>

