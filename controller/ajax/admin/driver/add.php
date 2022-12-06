<?php
include '../../../function.php';
include '../../../security-ajax.php'; 
if ( isLoginAdmin() !== true && $_SESSION['status'] != 2 &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
  
    echo error_page('انتهت مهلة الجلسة') ;
}else {

    $message = '';
    $code = 0;
    $status = 0;
    
//name: 
// Nationality: 
// IdNumber: 
// AccountNumber: 
// Workplace: 
// number: 

    if (!filter_var($_POST['name'], FILTER_SANITIZE_STRING)) {
      $message = 'من فضلك إكتب أسم  ';
      $code = 1;
      $status = 1;
    } else {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    
    if (!filter_var($_POST['number'], FILTER_SANITIZE_STRING)) {
      $message = 'number null ';
      $code = 9;
      $status = 1;
    } else {
      $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    }
    
        

    if (!filter_var($_POST['Nationality'], FILTER_SANITIZE_STRING)) {
        $message = 'Nationality null ';
        $code = 2;
        $status = 1;
      } else {
        $nationality = filter_var($_POST['Nationality'], FILTER_SANITIZE_STRING);
      }

      
      if (!filter_var($_POST['IdNumber'], FILTER_SANITIZE_STRING)) {
        $message = 'IdNumber null ';
        $code = 3;
        $status = 1;
      } else {
        $IdNumber = filter_var($_POST['IdNumber'], FILTER_SANITIZE_STRING);
      }

            
      if (!filter_var($_POST['AccountNumber'], FILTER_SANITIZE_STRING)) {
        $message = 'Account Number null ';
        $code = 4;
        $status = 1;
      } else {
        $AccountNumber = filter_var($_POST['AccountNumber'], FILTER_SANITIZE_STRING);
      }
      
                  
    if (!filter_var($_POST['Workplace'], FILTER_SANITIZE_STRING)) {
        $message = 'Workplace null ';
        $code = 5;
        $status = 1;
      } else {
        $Workplace = filter_var($_POST['Workplace'], FILTER_SANITIZE_STRING);
      }
      

         
    if (!isset($name) == '') {
      // chack Username 
      $sql = "SELECT id FROM `driver` WHERE name = '$name' and IDNumber = '$IdNumber' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $message = 'مسجل سابقاّ بالفعل ';
          $code = 7;
          $status = 1;
      }
  }

      
    if ($status == 0) {
        $sql = "INSERT INTO `driver` (`name`, `nationality`, `IDNumber`, `AccountNumber`, `Workplace`, `number`, `date`, `status`)
         VALUES ( '$name', '$nationality', '$IdNumber', '$AccountNumber', '$Workplace', '$number', '$now', 0);";
          if ($conn->query($sql) === TRUE) {
          $message =  "تم إعتماد البيانات بنجاح ";
          $code = 200 ;
      } else {
          $code = 2 ; 
          $message =  "Error updating : #1"; 
      }
    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>
