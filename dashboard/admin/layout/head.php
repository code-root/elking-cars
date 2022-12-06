<?php 
 if (is_file('../../controller/function.php')) {
    include '../../controller/function.php';
 }else if (is_file('../controller/function.php'))  {
    include '../controller/function.php';
 }else {
    include '../../../controller/function.php';

 }
 
 if ( isLoginAdmin() !== true or $_SESSION['status'] !== 'admin'  ) {  
        echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'dashboard/index.php">';
        echo error_page('انتهت مهلة الجلسة') ;
}else {
   echo HeaderTile ('Admin Home ', 0) ;

}  ?>
