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
                    <h6 class="mb-0">إيصال سداد</h6>
                </div>
                <div class="card-body p-2">
                    <h4 class="text-uppercase text-body text-xs font-weight-bolder">  ايصال سداد لـعربية :  <?=CarsBrand($row['carsID'])?> / <?=CarsCategory($row['carsID'])?> / <?=CarsModel($row['carsID'])?> </h4>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder"> للعميل :  <?=customerName($row['customerID'])?> / <?=customerNum($row['customerID'])?> </h6>
                    <form id="FormID"> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>المتبقي</label>
                                    <input type="txt" class="form-control" id="Residual" name="Residual" value="<?=$row['Residual']?>" disabled placeholder="المتبقي">
                                </div>
                            </div>

                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="number_count" id="number_count" placeholder="المبلغ">
                                    <input type="number" class="form-control" value="<?=$functionID?>" name="functionID" id="functionID" hidden>
                                </div>
                            </div>
 
                        
                        </div>

                       <button type="submit" class="add btn bg-gradient-secondary">إضافة </button>
                    </form>
                </div>
            </div>
        </div>

        <?php include '../layout/footer.php'; ?>
        <script>
            $('.add').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '<?=url_ajax()?>users/collectors/payment-receipt.php',
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