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
                    <h6 class="mb-0">إضافة مصروف جديد</h6>
                </div>
                <div class="card-body p-2">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">مصروف إيصال جديد</h6>
                    <form id="FormID"> 
                        <div class="row">

                        <div class="col-md-6">
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
                               
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                    <label> إختر الموظف </label>
                                    <select class="form-control" name="customerID">
                             <option value="0" selected disabled >إسم الموظف</option>
                                                    <?php
                                                    $sql = "SELECT * FROM employees where status = 0 ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                      while($row = $result->fetch_assoc()) {  ?>
                                                  <option value= "<?=$row['id']?>"> <?=$row['name']?></option>
                                                   <?php    } } ?>
                                                </select>
                                            </div>
                               
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="number_count" id="number_count" placeholder="المبلغ">
                                </div>
                                <div class="form-group">
                                <label>إسم البيان</label>
                                    <input type="txt" class="form-control" name="name" value="" placeholder="إسم البيان">
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

              $('.ccc').hide();
            $('.add').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '<?=url_ajax()?>users/employees/outlay.php',
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