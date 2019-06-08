<?php
$ds = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2


if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    //$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetPath = "./";
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
    $fpath = './Uploads/tempzip/';
    $data['name'] = 'mzy';
    $data['file'] = $_FILES;
    $data['target'] = $targetFile;
    $data['file_name'] = $_FILES['file']['name'];

    echo json_encode($data);

     
}

?>