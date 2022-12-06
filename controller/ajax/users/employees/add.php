<?php
include '../../../function.php';
include '../../../security-ajax.php'; 
if ( isLoginAdmin() !== true && $_SESSION['status'] != 'user' &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
  
    echo error_page('انتهت مهلة الجلسة') ;
}else {
        if (!isset($_POST['UserIdLogin'])) {
      $UserIdLogin = filter_var($_SESSION["customerId"], FILTER_SANITIZE_STRING);
    }else {
      $UserIdLogin = filter_var($_POST['UserIdLogin'], FILTER_SANITIZE_STRING);

    }

    $message = '';
    $code = 0;
    $status = 0;
    
    if (!filter_var($_POST['name'], FILTER_SANITIZE_STRING)) {
      $message = 'من فضلك إكتب أسم العميل';
      $code = 1;
      $status = 1;
    } else {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    
    if (!filter_var($_POST['number'], FILTER_SANITIZE_STRING)) {
      $message = 'برجاء إضافة رقم الهاتف';
      $code = 9;
      $status = 1;
    } else {
      $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
      if (strlen($number) != 11) {
        $message = 'برجاء إضافة رقم الهاتف المكون من 11 رقم';
        $code = 3;
        $status = 1;
      }
    }
    
        

    if (!filter_var($_POST['Nationality'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إضافة الجنسية';
        $code = 2;
        $status = 1;
      } else {
        $nationality = filter_var($_POST['Nationality'], FILTER_SANITIZE_STRING);
      }

      
      if (!filter_var($_POST['IdNumber'], FILTER_SANITIZE_STRING)) {
   
      } else {
        $NationalityID = filter_var($_POST['IdNumber'], FILTER_SANITIZE_STRING);
        if (strlen($NationalityID) != 14) {
          $message = 'برجاء إضافة رقم الهوية المكون من 14 رقم';
          $code = 3;
          $status = 1;
        }
      }

            
      if (!filter_var($_POST['addone'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إضافة العنوان الأول';
        $code = 4;
        $status = 1;
      } else {
        $addone = filter_var($_POST['addone'], FILTER_SANITIZE_STRING);
        @$addtwo = filter_var($_POST['addtwo'], FILTER_SANITIZE_STRING);

      }
      
      @$num2 = filter_var($_POST['num2'], FILTER_SANITIZE_STRING);
      @$num3 = filter_var($_POST['num3'], FILTER_SANITIZE_STRING);
      @$AccountNumber = filter_var($_POST['AccountNumber'], FILTER_SANITIZE_STRING);
      @$FileID  = filter_var($_POST['fileID'], FILTER_SANITIZE_STRING);
      
         
    if (!isset($name) == '') {
      // chack Username 
      $sql = "SELECT id FROM `employees` WHERE UserId = '$UserIdLogin' and IDNumber = '$NationalityID' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $message = 'مسجل سابقاّ بالفعل ';
          $code = 7;
          $status = 1;
      }
  }

      
    if ($status == 0) {
      $sql = "INSERT INTO `employees` ( `UserId`, `name`, `nationality`, `IDNumber`, `AccountNumber`, `numderone`, `numdertwo`, `number`, `addressone`, `addresstwo`, `date`, `FileID`, `status`)
       VALUES ( '$UserIdLogin', '$name', '$nationality', '$NationalityID', '$AccountNumber', '$num2', '$num3', '$number', '$addone', '$addtwo', '$now', '$FileID', 0);";
      
      // $sql = "INSERT INTO `customers` (`UserId`, `name`, `nationality`, `IDNumber`, `AccountNumber`, `email`, `number`, `date`, `FileID`, `status`)
      //    VALUES ('$UserIdLogin', '$name', '$nationality', '$NationalityID', '$AccountNumber', '$email', '$number', '$now', '$FileID', 0);";
      
      if ($conn->query($sql) === TRUE) {
          $message =  "تم إعتماد البيانات بنجاح ";
          $code = 200 ;
          echo   UpdateAdmin($_SESSION['name'] , $now , $name . 'إضافة عميل جديد' ) ;

      } else {
          $code = 2 ; 
          $message =  "Error updating : #1"; 
      }
    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>
