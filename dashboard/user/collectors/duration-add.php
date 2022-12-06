<?php include '../layout/head.php';
      include '../layout/nav.php' ;

      if (!isset($_GET['code'])) {

        echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=index.php">';
        echo error_page('Id Found') ;

      }
            $code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM `receipt`where  id = $code ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $functionID = $row['id'];
            
  ?> 
<div class="container-fluid py-4">
    <div class="row">
     
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">تمديد المدة </h6>
                </div>
                <div class="card-body p-2">
                    <h4 class="text-uppercase text-body text-xs font-weight-bolder"> الأجمالي السابق : <?=$row['total']?> </h4>
                    <h4 class="text-uppercase text-body text-xs font-weight-bolder"> المتبقي السابق : <?=$row['Residual']?> </h4>
                    <h4 class="text-uppercase text-body text-xs font-weight-bolder"> المسدد السابق : <?=$row['payer']?> </h4>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder"> للعميل :  <?=customerName($row['customerID'])?> / <?=customerNum($row['customerID'])?> </h6>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder"> التاريخ من <span> <?=date("Y-m-d",$row['FromDate'])?>  </span> إلى تاريخ <span> <?=date("Y-m-d",$row['ToDate'])?>  </span> </h6>
                    <form id="FormID"> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>عدد الأيام  </label>
                                   <input type="txt" value="0" name="fileID" id="upload_img" hidden>
                                   <input type="number" class="form-control" name="numberDays" id="numberDays" disabled placeholder=" عدد الأيام ">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>الإجمالي  </label>
                                <input type="number" class="form-control" name="total" id="total" placeholder="اجمالي المستحق ">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المتبقي  </label>
                                   <input type="txt" value="0" name="fileID" id="upload_img" hidden>
                                   <input type="number" class="form-control" name="Residual" id="Residual" placeholder="الباقي ">
                                   </div>

                                <div class="form-group">
                                <label >إجمالي مسسدد  </label>
                                <strong id="doneAll"></strong>
                                <input type="number" class="form-control" name="payer_all" hidden id="payer_all" placeholder="المسدد">
                                <input type="number" class="form-control" name="payer_usersOne" id="payer_usersOne" hidden value="<?=$row['payer']?>" placeholder="المسدد">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>المسدد</label>
                                <input type="number" class="form-control" name="payer" id="payer" placeholder="المسدد">

                                <label>حساب تسديد قديم </label>
                                <input type="number" class="form-control" name="Residual_old" id="Residual_old" placeholder="المسدد">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label> سعر اليوم </label>
                                    <input type="number" class="form-control" name="DayPrice" id="DayPrice" value="10" placeholder="سعر اليوم ">
                                    <input type="txt" class="form-control" name="receiptID" id="receiptID"  hidden  value="<?=$row['id']?>">
                                <label> من تاريخ </label>

                                    <input type="datetime-local" class="form-control" name="FromDate" id="FromDate"   value="<?=date("Y-m-d",$row['FromDate'])?>">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>إلى التاريخ  <?=date("Y-m-d",$row['ToDate'])?> </label>
                                    <input type="datetime-local" class="form-control" name="ToDate" id="ToDate" placeholder="إلى تاريخ">
                                </div>
                            </div>
                        </div>
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
                          $("#payer").change(function() { 
                payerCall();
              });
  
              $("#Residual_old").change(function() { 
                payerCall();
              });

              function payerCall () {
               let  Residual_old =  $("#Residual_old").val();
               let  payer =   $("#payer").val();
               let   payer_usersOne =   $("#payer_usersOne").val();
               $.ajax({
                    type: 'post',
                    url: '<?=url_ajax()?>users/collectors/payerCall.php',
                    data: {Residual_old:Residual_old ,payer:payer ,payer_usersOne:payer_usersOne  },
                    dataType: 'json',
                    success: function(data) {
                     $("#doneAll").html(data.nu);
                     $("#payer_all").val(data.nu);
                        console.log(data.nu); 
                    }
                });

               

              }


            $('.add').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '<?=url_ajax()?>users/collectors/duration-add.php',
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