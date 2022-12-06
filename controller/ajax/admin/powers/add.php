<?php
include '../../../function.php';
include '../../../security-ajax.php'; 
if ( isLoginAdmin() !== true && $_SESSION['status'] != 'admin' &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
  
    echo error_page('انتهت مهلة الجلسة') ;
}else {

    $message = '';
    $code = 0;
    $status = 0;
    

    if (!filter_var($_POST['name'], FILTER_SANITIZE_STRING)) {
      $message = 'من فضلك إكتب أسم الفرع';
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
    }
    
        

    if (!filter_var($_POST['username'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إضافة إسم المستخدم';
        $code = 2;
        $status = 1;
      } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      }

      
      if (!filter_var($_POST['number'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إضافة رقم الهاتف ';
        $code = 3;
        $status = 1;
      } else {
        $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
      }

            
      if (!filter_var($_POST['email'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إضافة البريد الإكتروني ';
        $code = 4;
        $status = 1;
      } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
      }
      
                  
    if (!filter_var($_POST['password'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إضافة كلمة المرور';
        $code = 5;
        $status = 1;
      } else {
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
      }
      

         
    if (!isset($name) == '') {
      // chack Username 
      $sql = "SELECT id FROM `users` WHERE Full_name = '$name' and email = '$email' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $message = 'مسجل سابقاّ بالفعل ';
          $code = 7;
          $status = 1;
      }
  }

      
    if ($status == 0) {
        $sql = "INSERT INTO `users` (`Full_name`, `username`, `password`, `number`, `email`, `img`, `status`, `Registration`)
                              VALUES ( '$name', '$username', '$password', '$number', '$email', '', 0, '$now');";
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
