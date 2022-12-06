<?php
include '../../../function.php';
include '../../../security-ajax.php'; 
if ( isLoginAdmin() !== true && $_SESSION['status'] != 'user' &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
  
    echo error_page('انتهت مهلة الجلسة') ;

}else {

        $nu = 0 ;

        if (isset($_POST['Residual_old']) && isset($_POST['payer']) && isset($_POST['payer_usersOne'])) {
                $Residual_old = filter_var($_POST['Residual_old'], FILTER_SANITIZE_STRING);
                $payer = filter_var($_POST['payer'], FILTER_SANITIZE_STRING);
                $payer_usersOne  = filter_var($_POST['payer_usersOne'], FILTER_SANITIZE_STRING);

                $one = $Residual_old + $payer ; 
                $nu = $payer_usersOne +  $one ;
        }
     


       echo json_encode(['nu'=>$nu]);

}  ?>
