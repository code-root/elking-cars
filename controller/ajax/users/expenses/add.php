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
    
  
    
        

    if (!filter_var($_POST['number_count'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إضافة العدد';
        $code = 2;
        $status = 1;
      } else {
        $number_count = filter_var($_POST['number_count'], FILTER_SANITIZE_STRING);
      }

      
    $TotalReceipt =  TotalReceipt ($UserIdLogin) ;

     $Total = $TotalReceipt - $number_count;

    if ($Total < 0 or nagitive_check($Total) == true) {
       $message = 'الخزنة لا تكفي لإضافة مصروف جديد';
        $code = 2;
        $status = 1;
    }

    if ($status == 0) {
      $sql = "INSERT INTO `expenses` ( `name`, `UserID`, `number_count`, `date`, `status`)
                                 VALUES ( '$name', '$UserIdLogin', '$number_count', '$now', 0);";
      
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
