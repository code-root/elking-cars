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
                        <div class="form-group">
                                    <label> إختر الفرع </label>
                                    <select class="form-control" name="UserIdLogin">
                             <option value="0" selected disabled >إختر الفرع</option>
                                                    <?php
                                                    $sql = "SELECT * FROM users where status = 0 ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                      while($row = $result->fetch_assoc()) {  ?>
                                                  <option value= "<?=$row['id']?>"><?=$row['Full_name']?></option>
                                                   <?php    } } ?>
                                                </select>
                                            </div>
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
                                                    $sql = "SELECT * FROM customers where status = 0 ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                      while($row = $result->fetch_assoc()) {  ?>
                                                  <option value= "<?=$row['id']?>"> <?=$row['name']?> / <?=$row['number']?></option>
                                                   <?php    } } ?>
                                                </select>
                                            </div>

                                <div class="form-group">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label> إختر العربية </label>
                            <select class="form-control" name="carsID">
                             <option value="0" selected disabled >العربية</option>
                                                    <?php
                                                    $sql = "SELECT * FROM cars where status = 0 ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                      while($row = $result->fetch_assoc()) {  ?>
                                                  <option value= "<?=$row['id']?>"> <?=$row['Brand']?> / <?=$row['color']?> /  <?=$row['Model']?> / <?=$row['Plate']?>  </option>
                                                   <?php    } } ?>
                                                </select>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> سعر اليوم </label>
                                    <input type="number" class="form-control" name="DayPrice" id="DayPrice" value="10" placeholder="سعر اليوم ">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اجمالي المستحق </label>
                                    <input type="number" class="form-control" name="total" id="total" placeholder="اجمالي المستحق ">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>الباقي </label>
                                    <input type="number" class="form-control" name="Residual" id="Residual" placeholder="الباقي ">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المسدد </label>
                                    <input type="number" class="form-control" name="payer" id="payer" placeholder="المسدد">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                <label> عدد الأيام </label>
                        <input type="number" class="form-control" name="numberDays" id="numberDays" disabled placeholder=" عدد الأيام ">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>من التاريخ  </label>
                                   <input type="txt" value="0" name="fileID" id="upload_img" hidden>
                                    <input type="datetime-local" class="form-control" name="FromDate" id="FromDate" placeholder="من التاريخ ">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>إلى التاريخ  </label>
                                    <input type="datetime-local" class="form-control" name="ToDate" id="ToDate" placeholder="إلى تاريخ">
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
                        <div class="col-md-6">
                        <button type="submit" class="add btn bg-gradient-secondary">إضافة </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <?php include '../layout/footer.php'; ?>
        <script>
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
        </script>