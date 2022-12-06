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

    if (!filter_var($_POST['date'], FILTER_SANITIZE_STRING)) {
      $message = 'date NULL ';
      $code = 1;
      $status = 1;
    } else {
      $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
      $date = strtotime($date);
    }
    


    if (!isset($_POST['carsID']) ) {
        $message = 'carsID null ';
        $code = 2;
        $status = 1;
      } else {
        $carsID = filter_var($_POST['carsID'], FILTER_SANITIZE_STRING);
      }

            
      if (!filter_var($_POST['total'], FILTER_SANITIZE_STRING)) {
        $message = 'total  null ';
        $code = 4;
        $status = 1;
      } else {
        $total = filter_var($_POST['total'], FILTER_SANITIZE_STRING);
      }
      
                  
          
      if (!filter_var($_POST['FromDate'], FILTER_SANITIZE_STRING)) {
        $message = 'From Date null ';
        $code = 5;
        $status = 1;
      } else {
        $FromDate = filter_var($_POST['FromDate'], FILTER_SANITIZE_STRING);
        $FromDate = strtotime($FromDate);
      }
      

      if (!filter_var($_POST['ToDate'], FILTER_SANITIZE_STRING)) {
        $message = 'ToDate null ';
        $code = 5;
        $status = 1;
      } else {
        $ToDate = filter_var($_POST['ToDate'], FILTER_SANITIZE_STRING);
        $ToDate = strtotime($ToDate);
      }

      if (!isset($_POST['customerID'])) {
        $message = 'customerID null ';
        $code = 5;
        $status = 1;
      } else {
        $customerID = filter_var($_POST['customerID'], FILTER_SANITIZE_STRING);
      }
      @$Residual = filter_var($_POST['Residual'], FILTER_SANITIZE_STRING);
      @$payer = filter_var($_POST['payer'], FILTER_SANITIZE_STRING);
      @$FileID  = filter_var($_POST['fileID'], FILTER_SANITIZE_STRING);

      if (empty($payer)) {
        $payer = 0;
      }

      if (empty($Residual)) {
        $Residual = 0;
      }

      if ($status == 0) {
        $sql = "INSERT INTO `receipt` ( `UserId`, `carsID`, `customerID`, `total`, `payer`, `Residual`, `collectorsDate`, `FromDate`, `ToDate`, `FileID`, `date`, `status`) VALUES ('$UserIdLogin', '$carsID', '$customerID', '$total', '$payer', '$Residual', '$date', '$FromDate', '$ToDate', '$FileID', '$nowYear', 0);";
          if ($conn->query($sql) === TRUE) {
          $message =  "تم إعتماد البيانات بنجاح ";
          $code = 200 ;
          echo UpdateCarsTwo ($carsID);
          echo UpdateAdmin($_SESSION['name'] , $now ,  'تاجير لعميل عربية ' ) ;

      } else {
          $code = 2 ; 
          $message =  "Error updating : #1"; 
      }
    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>
