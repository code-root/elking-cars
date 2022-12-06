<?php include 'layout/head.php';
include 'layout/nav.php';



$sql = "SELECT count(id) FROM cars where UserID = '$UserIdLogin' AND status = 0 ";
$result = $conn->query($sql);
if ($result->num_rows ==  0) {
  $cars = 0;
} else {
  $row = $result->fetch_assoc();
  $cars = $row['count(id)'];
}

$sql = "SELECT count(id) FROM customers where UserID = '$UserIdLogin' AND status = 0";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  $driver = 0;
} else {
  $row = $result->fetch_assoc();
  $driver = $row['count(id)'];
}

$sql = "SELECT SUM(payer) , SUM(Residual) FROM receipt where UserID = '$UserIdLogin' ";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  $receipt = 0;
  $Residual = 0;
} else {
  $row = $result->fetch_assoc();
  $receipt = $row['SUM(payer)'];
  $Residual = $row['SUM(Residual)'];
}



?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">عدد السائقين</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $driver ?>
                  <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                </h5>
              </div>
            </div>
            <div class="col-4 text-start">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">عدد السيارات</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $cars ?>
                  <!-- <span class="text-success text-sm font-weight-bolder">+33%</span> -->
                </h5>
              </div>
            </div>
            <div class="col-4 text-start">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">الخزنة</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $receipt -TotalExpenses ($UserIdLogin) -TotalOutlay($UserIdLogin) ?>
                  <span class="text-danger text-sm font-weight-bolder"></span>
                
                </h5>
              </div>
            </div>
            <div class="col-4 text-start">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">المديونات </p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $Residual ?>
                  <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                </h5>
              </div>
            </div>
            <div class="col-4 text-start">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row mb-3">
            <div class="col-6">
              <h6>تأجيرات  اليوم </h6>
              <p class="text-sm">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">نظرة سريعة </span>
              </p>
            </div>
          </div>
        </div>
        <div class="card-body p-0 pb-2">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ السداد / الوقت</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">اجمالي المستحق</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المسدد</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الباقي</th>
                </tr>
              </thead>
              <tbody>

                <?php
                 $sql = "SELECT * FROM `receipt`  where UserID = '$UserIdLogin' AND date = '$nowYear'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $functionID = $row['id'];
                ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <p><?=CarsBrand($row['carsID'])?> / <?=CarsCategory($row['carsID'])?> / <?=CarsModel($row['carsID'])?> </p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center">

                          <h6 class="mb-0 text-sm"><?= $row['total'] ?></h6>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $row['payer'] ?></h6>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $row['Residual'] ?></h6>
                        </div>
                      </td>
                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div> 
    <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>نظرة عامة  </h6>
             
              
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
              <?php
                  $usernameLogin = $_SESSION['name'];
              
              $sql = "SELECT * FROM `update-admin` where username = '$usernameLogin' order by id desc LIMIT 10   ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {?>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0"> أضاف <?=$row['username']?> ,  <?=$row['status']?> </h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?=arabicDate($row['time'])?></p>
                  </div>
                </div>
            <?php  } }?>
              </div>
            </div>
          </div>
        </div>
 </div>
  <?php include 'layout/footer.php'; ?>