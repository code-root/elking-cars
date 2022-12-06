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
                                <label> نوع الهوية </label>
                            <div class="form-group">
                            <select class="form-control" name="statusID" id="statusID">
                            <option value= "2">جواز سفر</option>
                            <option value= "1"  >رقم قومي</option>

                                            </select>
                            </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="IdNumber" id="IdNumber"  placeholder="الرقم القومي">
                                    <input type="txt" class="form-control" name="PassportID" id="PassportID"  placeholder="رقم جواز السفر">
                                </div>
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="AccountNumber" placeholder="رقم الحساب البنكي">
                                </div>

                                <div class="form-group">
                                    <input type="txt" class="form-control" name="num2" placeholder="رقم الهاتف 2">
                                </div>

                             
                            </div>
 
                            <div class="col-md-6">
                              
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="addone" placeholder="عنوان البطاقة">
                                </div>

                                <div class="form-group">
                                    <input type="txt" class="form-control" name="addtwo" placeholder="عنوان الإقامة">
                                </div>

                                <div class="form-group">
                                   <input type="txt" value="0" name="fileID" id="upload_img" hidden>
                                    <input type="number" class="form-control" name="number" placeholder=" رقم الهاتف إجباري">
                                </div>
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="num3" placeholder="رقم الهاتف 3">
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
            // $('#PassportID').hide();
            $('#IdNumber').hide();

        $("#statusID").change(function() { 
           if ($("#statusID").val() == 2) {
            $('#IdNumber').hide();
            $('#PassportID').show();
            console.log('case Id Number');
           }else {
            $('#PassportID').hide();
            $('#IdNumber').show();
            console.log('case Passport ID ');
           }
        });

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
        </script>