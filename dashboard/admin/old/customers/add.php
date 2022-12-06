<?php include '../layout/head.php';
      include '../layout/nav.php' ;

      $rand = rand_set() ;
      $_SESSION['files_rand'] = $rand;
      $_SESSION['file'] = 'customers';
      $_SESSION['case'] = $rand;
?>

<div class="container-fluid py-4">
    <div class="row">
     
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">إضافة عميل </h6>
                </div>
                <div class="card-body p-2">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">بيانات العميل</h6>
                    <form id="FormID">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="name" placeholder="اسم العميل">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="Nationality" placeholder="الجنسية ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="IdNumber" placeholder="الرقم القومي">
                                </div>
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="AccountNumber" placeholder="رقم الحساب البنكي">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                              
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="البريد الإكتروني">
                                </div>

                                <div class="form-group">
                                   <input type="txt" value="0" name="fileID" id="upload_img" hidden>
                                    <input type="number" class="form-control" name="number" placeholder="رقم الهاتف">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>رفع صورة البطاقة / مستند شخصي </label>
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
                    url: '<?=url_ajax()?>users/customers/add.php',
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