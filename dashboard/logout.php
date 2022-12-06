<?php
// session_start();
include '../controller/function.php';
        session_destroy();
        unset($_SESSION["customerId"]);
        unset($_SESSION["name"]);
        echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'dashboard/login.php">';
        echo error_page('إنتهت مهلة الجلسة') ;

?>