<?php
// session_start();
include '../function.php';
include '../security-ajax.php'; 
if (  $_SERVER['REQUEST_METHOD'] != 'POST') {  
    echo error_page('انتهت مهلة الجلسة') ;
    
}else {
        // $rand = rand_set() ;
        // $_SESSION['files_rand'] = $rand;
        // $_SESSION['file'] = 'form';

        $randSQL = $_SESSION['files_rand'];
        $file = $_SESSION['file'];
        $case =  $_SESSION['case'];
        $TimeCheck = strtotime("now");
        $files_arr = '';
    // Count total files
        $countfiles = count($_FILES['files']['name']);
    // Upload directory
        $upload_location = "../../upload/".$file."/";
    // To store uploaded files path
        $files_arr = array();
    // Loop all files
for($index = 0;$index < $countfiles;$index++){
    
   if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
      // File name
      $filename = $_FILES['files']['name'][$index];
      // Get extension
      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
      $new_file_name =  strtotime(date('Y-m-d H:i:s')) .  $file  . rand(1, 100) .'.'. $ext;
      // Valid image extension
      $valid_ext = array("png","jpeg","jpg","pdf","mp4","avi","flv");
      // Check extension
      if(in_array($ext, $valid_ext)){

         // File path
         $path = $upload_location.$new_file_name;
         
      
         // Upload file
         if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
            $sql = "INSERT INTO `uploadedfile` ( `file`, `rand`, `case` ,  `date`) VALUES ( '$new_file_name', '$randSQL', '$file' ,'$TimeCheck');" ;
            $conn->query($sql);
            echo UpdateAdmin(@$_SESSION['name'] , $now , 'uploaded file') ;

            $files_arr[] = $new_file_name;
         }
      }
   }
}
echo json_encode(['rand' => $randSQL, 'files_arr' => $files_arr]);
}  ?>