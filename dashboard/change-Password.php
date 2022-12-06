<?php include 'layout/head.php'; 
//  if ( isLoginAdmin() === true) {
//   echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'dashboard/user/">';
//   echo error_page('مسجل بالفعل جاري تحويلك ... ') ;
// }else {
// }
  echo HeaderTile ('Change Password', 1) ;


?>

<!-- End Navbar -->
<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('<?=url_assets()?>img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <!-- <p class="text-lead text-white"> قم بتسجيل دخولك للمنصة  </p> -->
                </div>
            </div>
        </div>
    </div>
    <?php 
    $code = 1 ;
    $err = '     <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
        <div class="card-header text-center pt-4">
        <h5>حدث خطأ !   </h5>
      </div>
      <div class="card-body">
            <div class="panel-body">
                <form role="form">
                    <fieldset>
                        <div class="form-group">
                           <p>   صلاحية الرابط الذي تحاول الوصول إلية منتهية علماَ بأن صلاحية الرابط
                           <br> ( نص يوم بعد الطلب تغير كلمة المرور) </p>
                        </div>
                        
                        <a type="submit" href="login.php" class="btn btn-login">الرجوع لتسجيل الدخول</a>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>'; ?>

    <?php 
                        if (empty($_GET['code'])) {
                            echo $err;
                            $code = 0; 
                        }else {
                       $kay = filter_var($_GET["code"], FILTER_SANITIZE_STRING);
                       $sql = "SELECT ex_date , status FROM password_reset_temp where kay = '$kay' ";
                       $result = $conn->query($sql);
                       if ($result->num_rows == 0) { 
                                echo $err;
                                $code = 0 ;
                               }else {
                             $get = $result->fetch_assoc();
                             $ex_date= $get['ex_date'];
                             $now =  strtotime("now");
                            $status= $get['status'];
                           if ($ex_date <= $now or  $status == 1 ) {
                               echo $err;
                                $code = 0;      
                           }
                       }
                   }

         if ($code == 1 ) {?>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>إعادة تعيين كلمة المرور </h5>
                    </div>
                    <div class="card-body">
                        <form role="form text-left">
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password1"
                                    placeholder="كلمة المرور الجديدة" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password2"
                                    placeholder="إعادة كتابة كلمة المرور" required>
                                <input type="password" name="kay" hidden value="<?=$kay?>">

                            </div>
                            <div class="text-center">

                                <button type="submit" class="submit1 rest btn bg-gradient-dark w-100 my-4 mb-2"> تغير
                                    كلمة المرور </button>
                            </div>
                            <p class="text-sm mt-3 mb-0"> لا تمتلك حساب ؟<a href="<?=url_Dashboard()?>registration"
                                    class="text-dark font-weight-bolder"> سجل الأن </a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'layout/footer.php';  ?>
<script>
$(function() {
    $('form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '../controller/ajax/change-Password.php',
            data: $('form').serialize(),
            dataType: 'json',
            cache: false,
            success: function(data) {
                if (data.code == 200) {
                    swal(data.msg, "", "success", {
                        button: "حسنا ",
                    });
                    setTimeout(function() {
                        window.location.href = "login.php";
                    }, 3000);
                } else {
                    swal(data.msg, "", "error", {
                        button: "حسنا ",
                    });
                }
                console.log(data);
            }
        });
    });
});
</script>
<?php   }   ?>