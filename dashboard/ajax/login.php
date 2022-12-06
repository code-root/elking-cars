<?php
session_start();
include '../../controller/conn.php';
include '../../controller/security-ajax.php';
$conn = db($db);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $status = 0;
    $message = null;
    $code = 0;
    $status = 0;
    if (!filter_var($_POST['username'], FILTER_SANITIZE_STRING)) {
        $message = 'لم تقم بإضافة  البريد الأكتروني ';
        $code = 3;
        $status = 1;
    } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    }


    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
       $EmailOrUsername = 'email';
      } else {
        $EmailOrUsername = 'username';

      }

    if (empty($_POST['password'])) {
        $message = 'لم تقم بإضافة  كلمة المرور ';
        $code = 4;
        $status = 1;
    } else {
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    }


    if ($status == 0) {
   $passwordTwo =  sha1($password);

         $sql = "SELECT * FROM `admin` where $EmailOrUsername = '$username'  AND password = '$passwordTwo' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)  {
        $get = $result->fetch_assoc();
        $_SESSION['customerId']   = $get['id']; // Register User ID in Session               
        $_SESSION['name']     = $get['FullName'] ; // RegisterUsername   
        $_SESSION['img']     = '';   // RegisterUsername   
        $_SESSION['status'] =  'admin';
        setcookie("customerId", $get['id']);
        setcookie("name", $get['FullName'], time()+3600000);  /* expire in 1 hour */                                                        
        setcookie("status", $_SESSION['status'], time()+3600000);  /* expire in 1 hour */                                                        
        $message = "مرحبا   " . $_SESSION['name'] . " تم تسجيل الدخول .. ";
        $code =200 ;
   
    } else {
         $sql = "SELECT * FROM `users` where $EmailOrUsername = '$username'  AND password = '$password' AND status = 0 ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)  {
        $get = $result->fetch_assoc();
        $_SESSION['customerId']   = $get['id']; // Register User ID in Session               
        $_SESSION['name']     = $get['Full_name'] ; // RegisterUsername   
        $_SESSION['img']     = '';   // RegisterUsername   
        $_SESSION['status'] =  'user';
        setcookie("customerId", $get['id']);
        setcookie("name", $get['Full_name'], time()+3600000);  /* expire in 1 hour */                                                        
        setcookie("status", $_SESSION['status'], time()+3600000);  /* expire in 1 hour */                                                        
        $message = "مرحبا   " . $_SESSION['name'] . " تم تسجيل الدخول .. ";
        $code =200 ;
      
    }else {
        $message = "من فضلك تحقق من صحة البيانات ";
        $code =5 ;
     }
    }
}

    echo json_encode(['code' => $code, 'msg' => $message]);

} else {

    $msg = 'You do not have permission to view the content';
    echo json_encode(['code' => 'You do not have powers', 'Message' => $msg]);
    exit;
}
