<?php include 'layout/head.php'; 
 if ( isLoginAdmin() === true) {
  echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'dashboard/user/">';
  echo error_page('مسجل بالفعل جاري تحويلك ... ') ;
}else {
  echo HeaderTile ('تسجيل جديد', 1) ;
}

?>
<!-- End Navbar -->
<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?=url_assets()?>img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">أهلا بعودتك !</h1>
            <!-- <p class="text-lead text-white"> قم بتسجيل دخولك للمنصة  </p> -->
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>إعادة تعيين كلمة المرور  </h5>
            </div>
            <div class="card-body">
              <form role="form text-left">
                <div class="mb-3">
                <input class="form-control" placeholder="البريد الالكتروني" name="email" type="email" autofocus="">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">إرسال</button>
                </div>
                <p class="text-sm mt-3 mb-0"> لا تمتلك حساب  ؟<a href="<?=url_Dashboard()?>registration" class="text-dark font-weight-bolder"> سجل الأن </a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'layout/footer.php'; ?>
    <script>
    $(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/ajax/reset_password.php',
                data: $('form').serialize(),
                dataType: 'json',
                cache : false,
                success: function (data) {
            if (data.code == 200 ) {
                  swal(data.msg, "" , "success", { button: "حسنا ", });
                  setTimeout(function(){ window.location.href= "login.php";}, 3000);
                 }else {
                  swal(data.msg, "" , "error", { button: "حسنا ", });
                 } 
                 console.log(data);
        } 
            });
        });
    });
</script>