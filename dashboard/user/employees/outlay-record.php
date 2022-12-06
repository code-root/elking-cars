<?php include '../layout/head.php';
      include '../layout/nav.php' ;
      if (!isset($_GET['code'])) {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=index.php">';
        echo error_page('Id Found') ;
      }
            $code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
            $sql = "SELECT id , `customerID`  FROM `outlay` where  customerID = $code ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $functionID = $row['id'];
            $customerID = $row['customerID']; ?> 
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>قائمة مصاريف <?=GetNameEmployee($customerID)?> </h6>
              <a  href="add.php" class="btn btn-info">إضافة مصروف جديد</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">إسم الموظف </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ  / الوقت </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">البيان </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المبلغ</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php  $sql = "SELECT * FROM `outlay`  where customerID = '$customerID' AND  UserID = '$UserIdLogin'  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID = $row['id']; ?>
                    <tr>
                    <div class="d-flex px-2 py-1">
                    <td><a href="outlay-record.php?code=<?=$row['customerID']?>">  <div class="d-flex flex-column justify-content-center"><h6 class="mb-0 text-sm"><?=GetNameEmployee($row['customerID'])?>  </h6></div></div> </a> </td>
                    <td><div class="d-flex flex-column justify-content-center"><h6 class="mb-0 text-sm"><?=date("Y-m-d H:i:s",$row['date'])?>  </h6></div></div></td>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['name']?></span></td>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['number_count']?></span></td>
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
    