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
    
    if (!filter_var($_POST['functionID'], FILTER_SANITIZE_STRING)) {
      $message = 'errors #1';
      $code = 1;
      $status = 1;
    } else {
      $functionID = filter_var($_POST['functionID'], FILTER_SANITIZE_STRING);
    }
  

    if (!filter_var($_POST['number_count'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إضافة العدد';
        $code = 2;
        $status = 1;
      } else {
        $number_count = filter_var($_POST['number_count'], FILTER_SANITIZE_STRING);
      }

      $GetResidual = GetResidual($functionID) ; 
      $payersSQL = payersSQL($functionID) ; 
      if ($GetResidual < 1 ) {
        $message = 'تم سداد كامل الفاتورة سابقاَ';
        $code = 2;
        $status = 1;
      }

      if ($number_count >  $number_count ) {
        $message = 'الرقم المسدد أكبر من رقم المستحق ';
        $code = 2;
        $status = 1;
      }

    if ($status == 0) {
      $sql = "INSERT INTO `payment_receipt` ( `UserID`, `receiptID`, `amount`, `date`) 
                VALUES ( '$UserIdLogin', '$functionID', '$number_count', '$now');";
    
      if ($conn->query($sql) === TRUE) {
      
        $Residual = $GetResidual - $number_count ;
        // $total = $total + $number_count ;
        $payers = $payersSQL + $number_count ;

        $sql = "UPDATE `receipt` SET  payer = '$payers' , Residual=$Residual where id = '$functionID' ";
        $conn->query($sql);
          $message =  "تم إعتماد البيانات بنجاح ";
          $code = 200 ;
          echo   UpdateAdmin($_SESSION['name'] , $now , $number_count . 'إضافة إيصال دفع جديد' ) ;

      } else {
          $code = 2 ; 
          $message =  "Error updating : #1"; 
      }
    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>
