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
      
      if (!filter_var($_POST['total'], FILTER_SANITIZE_STRING)) {
        $message = 'total null ';
        $code = 3;
        $status = 1;
      } else {
        $total = filter_var($_POST['total'], FILTER_SANITIZE_STRING);
      }

            
      if (!filter_var($_POST['total'], FILTER_SANITIZE_STRING)) {
        $message = 'total  null ';
        $code = 4;
        $status = 1;
      } else {
        $total = filter_var($_POST['total'], FILTER_SANITIZE_STRING);
      }
      
                  
      if (!filter_var($_POST['ToDate'], FILTER_SANITIZE_STRING)) {
        $message = 'ToDate null ';
        $code = 5;
        $status = 1;
      } else {
        $ToDate = filter_var($_POST['ToDate'], FILTER_SANITIZE_STRING);
        $ToDate = strtotime($ToDate);
      }

      

      if (!isset($_POST['receiptID'])) {
        $message = 'receiptID null ';
        $code = 7;
        $status = 1;
      } else {
        $receiptID = filter_var($_POST['receiptID'], FILTER_SANITIZE_STRING);
      }

      
      @$Residual = filter_var($_POST['Residual'], FILTER_SANITIZE_STRING);
      @$payer_all = filter_var($_POST['payer_all'], FILTER_SANITIZE_STRING);
      @$payer = filter_var($_POST['payer'], FILTER_SANITIZE_STRING);
      @$Residual_old = filter_var($_POST['Residual_old'], FILTER_SANITIZE_STRING);
      if (empty($payer)) {
        $payer = 0;
      }

      if (empty($Residual)) {
        $Residual = 0;
      }

      if (empty($Residual_old)) {
        $Residual_old = 0;
      }


      if ($status == 0) {
        $sql_receipt = "SELECT carsID , total , payer , Residual , ToDate , collectorsDate  FROM `receipt`where  id = $receiptID ";
        $result_receipt = $conn->query($sql_receipt);
        $receipt = $result_receipt->fetch_assoc();
 
        $carsID = $receipt['carsID'];
        $total_receipt = $receipt['total'];
        $payer_receipt = $receipt['payer'];
        $Residual_receipt = $receipt['Residual'];
        $ToDate_receipt = $receipt['ToDate'];
        $collectorsDate_receipt = $receipt['collectorsDate'];
        
        $total_end = $total_receipt + $total;
        $Residual_end = $Residual_receipt + $Residual;
        $payer_end = $payer_receipt + $payer;

   $Residual_One = $Residual_end - $Residual_old ;
    $re = $Residual_end - $Residual_old ;
    $re -= $payer ;
      $payer_One = $payer_end + $Residual_old ;
      $payer_end  = $total_end - $payer_all     ;
        $sql = "SELECT *  FROM duration_history where  receiptID =  '$receiptID' ";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
          $sql = "INSERT INTO `duration_history` ( `UserId`, `receiptID`, `total`, `payer`, `Residual`, `ToDate`, `status`,`date`)
          VALUES ( '$UserIdLogin', '$receiptID', '$total_receipt', '$payer_receipt', '$Residual_receipt', '$ToDate_receipt',0 , '$collectorsDate_receipt');";
          $conn->query($sql);
         }
        $sql = "INSERT INTO `duration_history` ( `UserId`, `receiptID`, `total`, `payer`, `Residual`, `ToDate`, `status`,`date`)
                                         VALUES ( '$UserIdLogin', '$receiptID', '$total', '$payer', '$Residual', '$ToDate',0 , '$now');";

        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE receipt SET total = '$total_end' , payer = '$payer_One' , Residual = '$payer_end' , ToDate = '$ToDate' WHERE id=$receiptID";
            $conn->query($sql);


            $message =  "تم إعتماد البيانات بنجاح الباقي" . $payer_end;
            $code = 200 ;
            echo UpdateCarsTwo ($carsID);
            echo UpdateAdmin($_SESSION['name'] , $now ,  'تمديد مدة لعميل  ' ) ;

      } else {
          $code = 2 ; 
          $message =  "Error updating : #1"; 
      }
    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>
