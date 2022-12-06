<?php include '../layout/head.php';
      include '../layout/nav.php' ;

      if (!isset($_GET['code'])) {

        echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=index.php">';
        echo error_page('Id Found') ;

      }
            $code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM `receipt`where  id = $code ";
            $result = $conn->query($sql);
             if ($result->num_rows ==  0) { 
                echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=index.php">';
                echo error_page('Id Found') ;
             }else {
                $row_re = $result->fetch_assoc();
                $functionID = $row_re['id'];
                $rand = rand_set() ;
                $_SESSION['files_rand'] = $rand;
                $_SESSION['file'] = 'receipt';
                $_SESSION['case'] = $rand;
             }
         
             $One  = date("Y-m-d",$row_re['FromDate']);
             $two =date("Y-m-d",$row_re['ToDate']) ;
             $numberDays = DateBetween($One , $two ) ;
            
  ?> 

<div class="container-fluid py-4">
    <div class="row">
     
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">تعديل بيانات أيراد  </h6>
                </div>
                <div class="card-body p-2">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">رقم الفاتوة | <?=$row_re['id']?></h6>
                    <h4 class="text-uppercase text-body text-xs font-weight-bolder"> الأجمالي السابق : <?=$row_re['total']?> </h4>
                    <h4 class="text-uppercase text-body text-xs font-weight-bolder"> المتبقي السابق : <?=$row_re['Residual']?> </h4>
                    <h4 class="text-uppercase text-body text-xs font-weight-bolder"> المسدد السابق : <?=$row_re['payer']?> </h4>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder"> للعميل :  <?=customerName($row_re['customerID'])?> / <?=customerNum($row_re['customerID'])?> </h6>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder"> التاريخ من <span> <?=date("Y-m-d",$row_re['FromDate'])?>  </span> إلى تاريخ <span> <?=date("Y-m-d",$row_re['ToDate'])?>  </span> </h6>
                    <form id="FormID"> 
                        <div class="row">
 
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label> العميل </label>
                                    <select class="form-control" name="customerID">
                                    <?php 
                                   $GetCustomersID =  GetCustomersID($row_re['customerID']);
                                   $GetCustomersID_re = json_decode($GetCustomersID);
                                   $CustomersID = $GetCustomersID_re->CustomersID;
                                   $CustomersInfo = $GetCustomersID_re->CustomerInfo;
                                ?>
                             <option value="<?=$CustomersID?>" selected  ><?=$CustomersInfo?></option>
                                                    <?php
                                                    $sql = "SELECT * FROM customers where status = 0 AND id !=$CustomersID ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                      while($row = $result->fetch_assoc()) {  ?>
                                                  <option value= "<?=$row['id']?>"> <?=$row['name']?> / <?=$row['number']?></option>
                                                   <?php    } } ?>
                                                </select>
                                            </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label> عدد الأيام </label>
                        <input type="number" class="form-control" name="numberDays" id="numberDays" value="<?=$numberDays?>"  disabled placeholder=" عدد الأيام ">
                        <input type="number" class="form-control" name="receiptID" id="receiptID" value="<?=$functionID?>"   hidden>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label> إختر العربية </label>
                            <select class="form-control" name="carsID">
                                <?php 
                                   $GetCarsID =  GetCarsID($row_re['carsID']);
                                   $GetCarsID_RE = json_decode($GetCarsID);
                                   $carsID = $GetCarsID_RE->CarsID;
                                   $CarsInfo = $GetCarsID_RE->CarsInfo;
                                ?>
                             <option value="<?=$carsID?>" selected disaled ><?=$CarsInfo?></option>
                                                    <?php
                                                    $sql = "SELECT * FROM cars where status = 0 AND id != $carsID ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                      while($row = $result->fetch_assoc()) {  ?>
                                                  <option value= "<?=$row['id']?>"> <?=$row['Brand']?> / <?=$row['color']?> /  <?=$row['Model']?> / <?=$row['Plate']?>  </option>
                                                   <?php    } } ?>
                                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اجمالي المستحق  <?=$row_re['total']?></label>
                                    <input type="number" class="form-control" value="<?=$row_re['total']?>" name="total" id="total_end" placeholder="اجمالي المستحق ">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                <label>الباقي <?=$row_re['Residual']?>  </label>
                                    <input type="number" class="form-control" value="<?=$row_re['Residual']?>" name="Residual" id="Residual" placeholder="الباقي ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المسدد <?=$row_re['payer']?> </label>
                                    <input type="number" class="form-control" value="<?=$row_re['payer']?>" name="payer" id="payer" placeholder="المسدد">
                                </div>
                            </div>
 
                        </div>

                        <div class="row">
                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>من التاريخ <?=date("Y-m-d",$row_re['FromDate'])?> </label>
                                    <input type="txt" value="<?=date("Y-m-d",$row_re['FromDate'])?>" class="form-control" name="FromDate" id="FromDate" placeholder="من التاريخ ">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>إلى التاريخ <?=date("Y-m-d",$row_re['ToDate'])?> </label>
                                    <input type="txt" class="form-control" name="ToDate" value="<?=date("Y-m-d",$row_re['ToDate'])?>" id="ToDate" placeholder="إلى تاريخ">
                                </div>
                            </div>
                        </div>
                      
                        <img class="ccc"  src="<?=url_Dashboard()?>loader.gif" style="width: 29px;height: 7%;position: relative;right: 40%;top: -20%;" >
                        <div class="col-md-6">
                        <button type="submit" class="add btn bg-gradient-secondary">تعديل الإيراد  </button>
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
                    url: '<?=url_ajax()?>users/edit/receipt.php',
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