<?php
include 'config.php';


function uploadFiles() {
    
    if ($_FILES && $_FILES['uploadedFile']['error']== UPLOAD_ERR_OK)
{
    $name = PATH_DIR . basename($_FILES['uploadedFile']['name']);
    if (is_uploaded_file($_FILES['uploadedFile']['tmp_name'])) {
   echo "Файл ". $_FILES['uploadedFile']['name'] ." успешно загружен.\n";
   echo "Отображаем содержимое\n:";
   readfile($_FILES['uploadedFile']['tmp_name']);
} else {
   echo "Возможная атака с участием загрузки файла: ";
   echo "файл '". $_FILES['uploadedFile']['tmp_name'] . "'.";
}
    
}

}
    
    

function deleteFile(){

}
function sizeFile(){
  
}
function d(){
  $args = func_get_args();
  echo '<pre>';
  array_map('print_r', $args);
  $info = pos(debug_backtrace());
  unset($info['args']);
  unset($info['function']);
  print_r($info);
  exit;}
  
 

?>

