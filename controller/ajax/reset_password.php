<?php
include '../function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $message = '';
    $code = 0;
    $status = 0;
    
    if (!filter_var($_POST['email'], FILTER_SANITIZE_STRING)) {
        $message = 'لم تقم بإضافة  البريد الأكتروني ';
        $code = 3;
        $status = 1;
    } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    }

    $sql = "SELECT * FROM users  where email = '$email' ";
    $result = $conn->query($sql);
    if ($result->num_rows ==  0) {
        $message = 'الإميل غير مسجل .. تأكد من الإميل ثم عاود المحاولة ';
        $code = 2;
        $status = 1;
    }

    if ($status == 0) {
        $get = $result->fetch_assoc();
        $rand_user =  $get['id'];
        $now =  strtotime("+12 hours");
        $key = md5(2418 * 2);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;

        $sql = "INSERT INTO password_reset_temp (UserID, kay, ex_date ,status)
                                        VALUES ('$rand_user', '$key', '$now' , 0)";

        if ($conn->query($sql) === TRUE) {
            $message = 'تم إرسال رسالة إعادة تغير كلمة المرور على البريد من فضلك قم بفتح البريد الأكتروني وإعادة الباسورد';
            $code = 200;
            $to = $email;

            $from = 'no-replay@abdulazizstudio.com';
            $name = 'Portfolio - Reset ';
            $subject = "رسالة إعادة تغير الرقم السري";

            $messageSend = "<a href='".URL."/dashboard/change-Password.php?code=" . $key . "'> إضغط هنا لتغير كلمة المرور </a>";
            // PHPMailer True
            $header = "From:no-replay@abdulazizstudio.com \r\n";
                    $header .= "no-replay@abdulazizstudio.com \r\n";
                    $header .= "MIME-Version: 1.0\r\n";
                    $header .= "Content-type: text/html\r\n";
                    


            mail($to, $subject, $messageSend, $headers);
        }
    }
    
    echo json_encode(['code' => $code, 'msg' => $message]);

} else {

    echo '<meta http-equiv="refresh" content="2;url='.URL.'">';
    echo error_page('جاري تحويلك ') ;
}


function adopt($text)
{
    return '=?UTF-8?B?' . Base64_encode($text) . '?=';
}
