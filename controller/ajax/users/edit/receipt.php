<?php
include '../../../function.php';
include '../../../security-ajax.php'; 
if ( isLoginAdmin() !== true && $_SESSION['status'] != 'user' &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
  
    echo error_page('انتهت مهلة الجلسة') ;
}else {

    if (!isset($_POST['receiptID']) ) {
        $message = 'receiptID Null ';
        $code = 2;
        $status = 1;
      } else {
        $receiptID = filter_var($_POST['receiptID'], FILTER_SANITIZE_STRING);
      }

    $message = '';
    $code = 0;
    $status = 0;


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

      if (empty($payer)) {
        $payer = 0;
      }

      if (empty($Residual)) {
        $Residual = 0;
      }

      if ($status == 0) {
            $sql = "UPDATE  `receipt` SET 
            carsID='$carsID' , total = '$total' , payer = '$payer' ,
            Residual = '$Residual' , FromDate = '$FromDate' , 
            ToDate = '$ToDate' , `date` = '$nowYear' WHERE id=$receiptID";
        // $sql = "INSERT INTO `receipt` ( `UserId`, `carsID`, `customerID`, `total`, `payer`, `Residual`, `collectorsDate`, `FromDate`, `ToDate`, `FileID`, `date`, `status`) VALUES ('$UserIdLogin', '$carsID', '$customerID', '$total', '$payer', '$Residual', '$date', '$FromDate', '$ToDate', '$FileID', '$nowYear', 0);";
          if ($conn->query($sql) === TRUE) {
          $message =  "تم إعتماد البيانات بنجاح ";
          $code = 200 ;
          echo UpdateCarsTwo ($carsID);
          echo UpdateAdmin($_SESSION['name'] , $now ,  'تعديل إيراد رقم الفاتورة | '.$receiptID.' ' ) ;

      } else {
          $code = 2 ; 
          $message =  "Error updating : #1"; 
      }
    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>
