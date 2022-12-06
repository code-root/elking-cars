<?php
include '../../../function.php';
include '../../../security-ajax.php'; 
if ( isLoginAdmin() !== true && $_SESSION['status'] != 'user' &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
  
    echo error_page('انتهت مهلة الجلسة') ;

}else {

        $numberDays = 0 ;
        $total = 0 ;
        if (isset($_POST['FromDate']) && isset($_POST['ToDate'])) {
                $two = filter_var($_POST['ToDate'], FILTER_SANITIZE_STRING);
                $One  = filter_var($_POST['FromDate'], FILTER_SANITIZE_STRING);
                $numberDays = DateBetween($One , $two ) ;

                if (isset($_POST['DayPrice'])) {
                $DayPrice = filter_var($_POST['DayPrice'], FILTER_SANITIZE_STRING);
                $total = $numberDays * $DayPrice ;
                }
        }
     


       echo json_encode(['numberDays'=>$numberDays, 'total'=>$total]);

}  ?>
