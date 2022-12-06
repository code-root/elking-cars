<?php include '../layout/head.php';
      include '../layout/nav.php' ;
  ?> 
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>سجل سداد </h6>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">رقم الفاتورة</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">إسم المستأجر </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">العربية</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المبلغ</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المتبقي</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ  / الوقت </th>    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ  / الوقت </th>
                    </tr>
                  </thead>
                  <tbody>
               <?php  
               $x = 0 ;
               $sql = "SELECT * FROM `payment_receipt`  where UserID = '$UserIdLogin'  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $x ++ ;
                            $functionID = $row['id'];
                            $UserId = $row['UserID'];
                            $receiptID = $row['receiptID'];
                            $sql_receipt = "SELECT * FROM `receipt` where id = $receiptID ";
                            $rep_res = $conn->query($sql_receipt);
                            $receipt = $rep_res->fetch_assoc();
                            ?>
                    <tr>
                    <td ><span class="text-secondary text-xs font-weight-bold"><?=$row['receiptID']?></span></td>
                    <td ><span class="text-secondary text-xs font-weight-bold"><?=customerName($receipt['customerID'])?> / <?=customerNum($receipt['customerID'])?></span>
                    <td ><span class="text-secondary text-xs font-weight-bold"><?=CarsBrand($receipt['carsID'])?> / <?=CarsCategory($receipt['carsID'])?> / <?=CarsModel($receipt['carsID'])?></span></td>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['amount']?></span></td>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$receipt['Residual']?></span></td>
                                      <td class=""><span class="text-secondary text-xs font-weight-bold"><?=date("Y-m-d H:i:s",$row['date'])?></span></td>
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