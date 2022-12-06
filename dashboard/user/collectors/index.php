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
              <h6>قائمة الإيصالات</h6>
              <a  href="add.php" class="btn btn-info">إضافة ايصال ايراد جديد</a>
              <a  href="payer.php" class="btn btn-info">سداد المتبقي ( الفواتير ) </a>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">رقم الفاتورة</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ  / الوقت </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">العربية </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم العميل / رقم الهاتف</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اجمالي المستحق</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المسدد</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الباقي </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">من التاريخ</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">إلى التاريخ</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ الإصافة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">set</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php  $sql = "SELECT * FROM `receipt`  where UserID = '$UserIdLogin'  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID = $row['id'];
                          ?>
                    <tr>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['id']?></span></td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=date("Y-m-d H:i:s",$row['collectorsDate'])?>  </h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                      <a href="../cars/record.php?code=<?=$row['carsID']?>">
                      <p class="text-secondary text-xs font-weight-bold"><?=CarsBrand($row['carsID'])?> / <?=CarsCategory($row['carsID'])?> / <?=CarsModel($row['carsID'])?></p> </a>
                      </td>
                      <td class="align-middle text-center">
                      <a href="../customers/record.php?code=<?=$row['customerID']?>">
                      <span class="text-secondary text-xs font-weight-bold"><?=customerName($row['customerID'])?> / <?=customerNum($row['customerID'])?></span>
                      </a>
                      </td>


                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['total']?></span></td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$row['payer']?></span>
                      </td>


                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$row['Residual']?></span>
                      </td>

                     <td class="align-middle text-center">
                     <a href="duration-add.php?code=<?=$functionID?>">
                       <span class="text-secondary text-xs font-weight-bold"><?=date("Y-m-d H:i:s",$row['FromDate'])?></span>
                       </a>
                      </td>

                      <td class="align-middle text-center">
                      <a href="duration-add.php?code=<?=$functionID?>">  
                      <span class="text-secondary text-xs font-weight-bold"><?=date("Y-m-d H:i:s",$row['ToDate'])?></span>
                      </a>
                    </td> 
               
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=arabicDate($row['date'])?></span>
                      </td>

                       <td> <?php
                       if ($row['status'] == 1 ){
                          echo '<span class="badge badge-pill bg-gradient-success">تمت بنجاح</span></td>';
                          } 

                          if ($row['status'] == 0 ) {
                          echo '<span class="badge badge-pill bg-gradient-warning" alt="s"> مع العميل </span></td>';
                          } ?>

                             </td>
        
                    </tr>
                    <?php  } }  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    

        <!-- App js -->



      <?php include '../layout/footer.php'; ?>