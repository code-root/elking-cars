<?php include '../layout/head.php';
      include '../layout/nav.php' ;

      $rand = rand_set() ;
      $_SESSION['files_rand'] = $rand;
      $_SESSION['file'] = 'contract';
      $_SESSION['case'] = $rand;
?>

<div class="container-fluid py-4">
    <div class="row">
     
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">إضافة حساب ايراد جديد</h6>
                </div>
                <div class="card-body p-2">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">ايصال ايجار جديد.</h6>
                    <form id="FormID"> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>تاريخ السداد  </label>
                                    <input type="datetime-local" class="form-control" name="date" value="" placeholder="تاريخ الإيصال">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label> العميل </label>
                                    <select class="form-control" name="customerID">
                             <option value="0" selected disabled >إسم العميل</option>
                                                    <?php
                                                    $sql = "SELECT * FROM customers where UserId = '$UserIdLogin' and status = 0 ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                      while($row = $result->fetch_assoc()) {  ?>
                                                  <option value= "<?=$row['id']?>"> <?=$row['name']?> / <?=$row['number']?></option>
                                                   <?php    } } ?>
                                                </select>                                </div>

                                <div class="form-group">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <select class="form-control" name="carsID">
                             <option value="0" selected disabled >العربية</option>
                                                    <?php
                                                    $sql = "SELECT * FROM cars where UserId = '$UserIdLogin' AND status = 0 ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                      while($row = $result->fetch_assoc()) {  ?>
                                                  <option value= "<?=$row['id']?>"> <?=$row['Brand']?> / <?=$row['Category']?></option>
                                                   <?php    } } ?>
                                                </select>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="total" id="total" placeholder="اجمالي المستحق ">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="payer" id="payer" placeholder="المسدد">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="Residual" id="Residual" placeholder="الباقي ">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>من التاريخ  </label>
                                   <input type="txt" value="0" name="fileID" id="upload_img" hidden>
                                    <input type="datetime-local" class="form-control" name="FromDate" placeholder="من التاريخ ">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>إلى التاريخ  </label>
                                    <input type="datetime-local" class="form-control" name="ToDate" placeholder="إلى تاريخ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>رفع صورة العقد </label>
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

            $("#total").change(function() { 
                total =  $('#total').val();
                $('#payer').val(total);
            });
            $("#payer").change(function() { 
                total =  $('#total').val();
                payer =  $('#payer').val();
                if (payer >= total) {
              //  $('#payer').val(total);
                }
                Residual = total - payer ;
                if (Residual <= 1) {
                $('#Residual').val('');
                }else {
            $('#Residual').val(Residual);
                }
            });

            $("#Residual").change(function() { 
                total =  $('#total').val();
                payer =  $('#payer').val();
                Residual =  $('#Residual').val();
                if (Residual >= total) {
                $('#Residual').val('');
                }
            });
              $('.ccc').hide();
            $('.add').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '<?=url_ajax()?>users/collectors/add.php',
                    data: $('#FormID').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        if (data.code == 200) {
                            swal(data.msg, "", "success", {
                                button: "حسنا ",
                            });
                        } else {
                            swal(data.msg, "", "error", {
                                button: "حسنا ",
                            });
                        }
                        console.log(data);
                    }
                });
            });

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
        </script>