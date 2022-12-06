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
    
      // OunerName: 
      // passage: 
      // LicenseRelease: 
      // LicenseExpiration: 
      // DateEntry: 
      // ExitDate: 
      // motorID: 
      // CariInspection: 


      if (!filter_var($_POST['CariInspection'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إدخال تاريخ فحص العربية';
        $code = 1;
        $status = 1;
      } else {
        $CariInspection = filter_var($_POST['CariInspection'], FILTER_SANITIZE_STRING);
      }


      if (!filter_var($_POST['DateEntry'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إدخال تاريخ عقد السيارة';
        $code = 10;
        $status = 1;
      } else {
        $DateEntry = filter_var($_POST['DateEntry'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['motorID'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إدخال رقم الماتور';
        $code = 11;
        $status = 1;
      } else {
        $motorID = filter_var($_POST['motorID'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['ExitDate'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء إدخال تاريخ إنتهاء عقد السيارة';
        $code = 12;
        $status = 1;
      } else {
        $ExitDate = filter_var($_POST['ExitDate'], FILTER_SANITIZE_STRING);
      }


      if (!filter_var($_POST['OunerName'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء كتابة إسم المالك';
        $code = 13;
        $status = 1;
      } else {
        $OunerName = filter_var($_POST['OunerName'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['LicenseRelease'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء كتابة تاريخ إصدار الرخصة';
        $code = 13;
        $status = 1;
      } else {
        $LicenseRelease = filter_var($_POST['LicenseRelease'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['LicenseExpiration'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء كتابة تاريخ إنتهاء الرخصة';
        $code = 13;
        $status = 1;
      } else {
        $LicenseExpiration = filter_var($_POST['LicenseExpiration'], FILTER_SANITIZE_STRING);
      }
      

      if (!filter_var($_POST['passage'], FILTER_SANITIZE_STRING)) {
        $message = 'برجاء كتابة منطقة المرور';
        $code = 14;
        $status = 1;
      } else {
        $passage = filter_var($_POST['passage'], FILTER_SANITIZE_STRING);
      }

    if (!filter_var($_POST['Brand'], FILTER_SANITIZE_STRING)) {
      $message = 'من فضلك Brand ';
      $code = 1;
      $status = 1;
    } else {
      $Brand = filter_var($_POST['Brand'], FILTER_SANITIZE_STRING);
    }
    
    if (!filter_var($_POST['color'], FILTER_SANITIZE_STRING)) {
      $message = 'color null ';
      $code = 9;
      $status = 1;
    } else {
      $color = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
    }
    
        
    if (!filter_var($_POST['Model'], FILTER_SANITIZE_STRING)) {
        $message = 'Model null ';
        $code = 2;
        $status = 1;
      } else {
        $Model = filter_var($_POST['Model'], FILTER_SANITIZE_STRING);
      }

      
      if (!filter_var($_POST['Plate'], FILTER_SANITIZE_STRING)) {
        $message = 'year null ';
        $code = 3;
        $status = 1;
      } else {
        $Plate = filter_var($_POST['Plate'], FILTER_SANITIZE_STRING);
      }

            
      if (!filter_var($_POST['Category'], FILTER_SANITIZE_STRING)) {
        $message = 'Category null ';
        $code = 4;
        $status = 1;
      } else {
        $Category = filter_var($_POST['Category'], FILTER_SANITIZE_STRING);
      }


    if (!filter_var($_POST['CarsID'], FILTER_SANITIZE_STRING)) {
      $message = 'من فضلك إضف رقم اللوجة ';
      $code = 5;
      $status = 1;
    } else {
      $CarsID = filter_var($_POST['CarsID'], FILTER_SANITIZE_STRING);
    }
      
 
      @$FileID  = filter_var($_POST['fileID'], FILTER_SANITIZE_STRING);
         
    
        
      if (!isset($type) == '') {
        // chack Username 
        $sql = "SELECT id FROM `cars` WHERE UserId = '$UserIdLogin' and Brand = '$Brand' AND `Category` = '$Category' AND `Model` = '$Model' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $message = 'مسجل سابقاّ بالفعل ';
            $code = 7;
            $status = 1;
        }
    }

      //exit;

    if ($status == 0) {
        $sql = "INSERT INTO `cars` (`UserId`, `Brand`, `LicenseRelease`, `LicenseExpiration`, `CariInspection`, `passage`, `OunerName`, `Category`, `Model`, `motorID`, `DateEntry`, `ExitDate`, `date`, `color`, `Plate`, `CarsID`, `status`, `FileID`) 
                            VALUES ( '$UserIdLogin', '$Brand', '$LicenseRelease', '$LicenseExpiration', '$CariInspection', '$OunerName' ,'$passage', '$Category', '$Model', '$motorID', '$DateEntry', '$ExitDate', '$now', '$color', '$Plate', '$CarsID', 0, '$FileID');";
          if ($conn->query($sql) === TRUE) {
          echo   UpdateAdmin($_SESSION['name'] , $now , $Brand . 'إضافة عربية جديدة' ) ;

          $message =  "تم إعتماد البيانات بنجاح ";
          $code = 200 ;
      } else {
          $code = 2 ; 
          $message =  "Error updating : #1"; 
      }
    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>