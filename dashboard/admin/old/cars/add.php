<?php include '../layout/head.php';
      include '../layout/nav.php' ;

      $rand = rand_set() ;
      $_SESSION['files_rand'] = $rand;
      $_SESSION['file'] = 'cars';
      $_SESSION['case'] = $rand;
?>
<!-- End Navbar -->
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
      
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1"> <?php  if (isset($_SESSION['name'])) {echo($_SESSION['name']); } ?> </h5>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">إضافة سيارة</h6>
                </div>
                <!-- النوع / الفئة	مكان العمل	سنة الصنع	رقم اللوحة	رقم حساب السيارة	أجرة اليوم -->
                <div class="card-body p-2">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">بيانات السيارة</h6>
                    <form id="FormID">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="Brand" placeholder="الماركه  ">
                                </div>

                                <div class="form-group">
                                    <input type="txt" class="form-control" name="color" placeholder="اللون">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="Category" placeholder="الفئة">
                                </div>

                                <div class="form-group">
                                    <input type="txt" class="form-control" name="Model" placeholder="Model">
                                </div>

                            </div>
                        </div>

                      
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="Plate" placeholder="رقم اللوحة">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="CarsID" placeholder="رقم الشاسيه">
                                   <input type="txt" value="0" name="fileID" id="upload_img" hidden>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>رفع صورة  </label>
                                <div class="form-group">
                                    <form method='post' action='' enctype="multipart/form-data"
                                        class="file-uploder get_file">
                                        <input type="file" id='files' name="files[]" class=" form-control" name="email"
                                            placeholder="إرفاق الملفات" multiple>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <img class="ccc"  src="<?=url_Dashboard()?>loader.gif" style="width: 29px;height: 7%;position: relative;right: 40%;top: -20%;" >
                 
                        <button type="submit" class="add btn bg-gradient-secondary">إضافة </button>
                    </form>
                </div>
            </div>
        </div>


        <?php include '../layout/footer.php'; ?>
        <script>
                   $('.ccc').hide();
                    $(document).ready(function() {
                      

            $('.add').click(function(e) {
            //    alert ('dcs');
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '<?=url_ajax()?>users/cars/add.php',
                    data: $('#FormID').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        if (data.code == 200) {
                            swal(data.msg, "", "success", {
                                button: "حسنا ",
                            });
                            // setTimeout(function() {
                            //     window.location.href = 'slider-add.php';
                            // }, 1000);
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

            $(document).ready(function() {
            $('input[type=file]').change(function(e) {
                var form_data = new FormData();
                $('.dds').hide().fadeOut(3);
                $('.ccc').show();

                // Read selected files
                var totalfiles = document.getElementById('files').files.length;
                for (var index = 0; index < totalfiles; index++) {
                    form_data.append("files[]", document.getElementById('files').files[index]);
                }
                // AJAX request
                $.ajax({
                    url: '<?=url_ajax()?>img-uploaded.php',
                    type: 'post',
                    data: form_data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var rand = response.rand;
                        var src = response.files_arr;
                        $('#upload_img').val(rand);
                $('.dds').show().fadeIn(3);
                $('.ccc').hide().fadeOut(3);

                        console.log(response.rand);
                    }
                });

            });

        });
        </script>