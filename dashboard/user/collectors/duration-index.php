<?php include '../layout/head.php';
      include '../layout/nav.php' ;

 if (isset($_GET['FunctionSuccess'])) {
    $functionID = filter_var($_GET['FunctionSuccess'], FILTER_SANITIZE_STRING);
         $sql = "UPDATE `receipt` SET status=0 where id = '$functionID' ";
         $conn->query($sql);
     }
     if (isset($_GET['FunctionWarning'])) {
        $functionID = filter_var($_GET['FunctionWarning'], FILTER_SANITIZE_STRING);
             $sql = "UPDATE `receipt` SET status=1 where id = '$functionID' ";
             $conn->query($sql);
         }
  ?> 
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>سجل تمديد المدة </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order ID </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ  / الوقت </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">العربية </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم العميل / رقم الهاتف</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اجمالي المستحق</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المسدد</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الباقي </th>
                    </tr>
                  </thead>
                  <tbody>
               <?php  $sql = "SELECT * FROM `duration_history`  where UserID = '$UserIdLogin'  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID = $row['id'];
                          $receiptID = $row['receiptID'];
                          $sql_receipt = "SELECT carsID , customerID  FROM `receipt`where  id = $receiptID ";
                          $result_receipt = $conn->query($sql_receipt);
                          $receipt = $result_receipt->fetch_assoc();
                          ?>
                    <tr>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['receiptID']?></span></td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=date("Y-m-d H:i:s",$row['date'])?>  </h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                      <a href="../cars/record.php?code=<?=$receipt['carsID']?>">
                      <p class="text-secondary text-xs font-weight-bold"><?=CarsBrand($receipt['carsID'])?> / <?=CarsCategory($receipt['carsID'])?> / <?=CarsModel($receipt['carsID'])?></p> </a>
                      </td>
                      <td class="align-middle text-center">
                      <a href="../customers/record.php?code=<?=$receipt['customerID']?>">
                      <span class="text-secondary text-xs font-weight-bold"><?=customerName($receipt['customerID'])?> / <?=customerNum($receipt['customerID'])?></span>
                      </a>
                      </td>


                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['total']?></span></td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$row['payer']?></span>
                      </td>


                      <td class="align-middle text-center">
                       <a href="payment-receipt.php?code=<?=$functionID?>"> <span class="text-secondary text-xs font-weight-bold"><?=$row['Residual']?></span></a>  </td>
                    
                    </tr>
                    <?php  } }  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include '../layout/footer.php'; ?>