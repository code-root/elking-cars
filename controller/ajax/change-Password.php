<?php
include '../function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $message = '';
    $code = 0;
    $status = 0;

    if ($_POST['kay'] == '') {
        $message = '<div  class="rounded col-5 mx-auto p-2 text-center bg-danger text-white"> حدث خطأ غير متوقع .. اذا استمرت المشكلة تواصل مع إدارة الموقع  </div>';
        $code = 1;
        $status = 1;
    }

    @$kay = filter_var($_POST["kay"], FILTER_SANITIZE_STRING);
    @$password1 = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
    @$password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);

    if ($_POST['password1'] == '') {
        $message = '<div  class="rounded col-5 mx-auto p-2 text-center bg-danger text-white">يرجى كتابة كلمة المرور  </div>';
        $code = 2;
        $status = 1;
    }

    if ($_POST['password2'] == '') {
        $message = '<div  class="rounded col-5 mx-auto p-2 text-center bg-danger text-white"> يرجى كتابة تأكيد كلمة المرور  </div>';
        $code = 3;
        $status = 1;
    }

    if ($password1 != $password2) {
        $message = '<div  class="rounded col-5 mx-auto p-2 text-center bg-danger text-white"> كلمة المرور غير متطابقة  </div>';
        $code = 4;
        $status = 1;
    }



    $sql = "SELECT UserID , ex_date , status FROM password_reset_temp where kay = '$kay' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $status = 1;
        $code = 5;
        
    } else {
        $get = $result->fetch_assoc();
        $status = $get['status'];
        if ($status == 1) {
            $code = 6;
            $status = 1;
        }
    }

    if ($status == 0) {
        $UserID = $get['UserID'];
        $sql = "SELECT id FROM users where id = '$UserID' ";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $password = sha1($password1);
            $sql = "UPDATE users SET password='$password1' WHERE id='$UserID' ";
            if ($conn->query($sql) === TRUE) {
                $sql = "UPDATE password_reset_temp SET status= 1 WHERE kay='$kay' ";
                $conn->query($sql);
                $code = 200;
                $message = 'تم إعادة تغير كلمة المرور بنجاح .. جاري تحويلك لتسجيل الدخول ';
            }
        }
    }

    if ($code != 200 ) {
        $message = 'حاول مره أخرى  .. صلاحية الرابط إنتهت';
        $status = 1;;
    }
    echo json_encode(['code' => $code, 'msg' => $message]);
    $conn->close();
   
 } else {

        echo '<meta http-equiv="refresh" content="2;url='.URL.'">';
        echo error_page('جاري تحويلك ') ;
    }
    