<?php include '../layout/head.php';
      include '../layout/nav.php' ;

 if (isset($_GET['FunctionSuccess'])) {
    $functionID = filter_var($_GET['FunctionSuccess'], FILTER_SANITIZE_STRING);
         $sql = "UPDATE `cars` SET status=0 where id = '$functionID' ";
         $conn->query($sql);
     }
     if (isset($_GET['FunctionWarning'])) {
        $functionID = filter_var($_GET['FunctionWarning'], FILTER_SANITIZE_STRING);
             $sql = "UPDATE `cars` SET status=1 where id = '$functionID' ";
             $conn->query($sql);
         }

        
       
  ?> 
  <head> 
         <title> قائمة العربيات </title>
  </head> 
  <body>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>قائمة العربيات</h6>
              <a  href="add.php" class="btn btn-info">إضافة عربية جديدة</a>

            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

              <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الفرع</th>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الماركة / الموديل</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المالك</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الفئة / اللون</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">مرور</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ تحرير الرخصة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ انتهاء الرخصة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ فحص العربية </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">بداية عقد السيارة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">نهاية عقد السيارة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">رقم الماتور</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">رقم اللوحة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">رقم الشاسية</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ التسجيل</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">استرجاع</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">حذف</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحالة</th>

                    </tr>
                  </thead>
                  <tbody>
               <?php
                $x = 0;
               $sql = "SELECT * FROM `cars`  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $x ++;
                          $functionID = $row['id'];
                          $image = $row['FileID'];
                          $UserId = $row['UserId'];

                          ?>
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                              <?php echo BranchName($UserId)?>
                             </h6>
                          </div>
                        </div>
                      </td>

                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$x?></span></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                      <a href="<?=url_upload()?>cars/<?=get_img($image)?>" target="_blank"> 
                      <img src="<?=url_upload()?>cars/<?=get_img($image)?>" class="avatar avatar-sm me-3" alt="user1">
                      </a>  
                                  </div>
                          <div class="d-flex flex-column justify-content-center">
                            <a href="record.php?code=<?=$functionID?>"><h6 class="mb-0 text-sm"><?=$row['Brand']?> / <?=$row['Model']?> </h6></a> 
                          </div>
                        </div>
                      </td>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['passage']?></span></td>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['Category']?>  / <?=$row['color']?>  </span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['OunerName']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['LicenseRelease']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['LicenseExpiration']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['CariInspection']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['DateEntry']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['ExitDate']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['motorID']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['Plate']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['CarsID']?></span></td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=arabicDate($row['date']) ?> </span>
                          <p><?php echo date("Y/m/d", $row['date'])?></p>
                      </td>
                      <td><form action="" method="GET"><button type="submit" class="btn btn-success "  name="FunctionSuccess" value="<?=$functionID?>" >استرجاع </button> </form> </td>
                       <td><form action="" method="GET"><button type="submit" class="btn btn-warning "  name="FunctionWarning" value="<?=$functionID?>" >حذف </button> </form> </td>
                       <td>
                       <?php 
                          if ($row['status'] == 0) {
                          echo '<span class="badge badge-pill bg-gradient-success"> متوفرة للحجز </span></td>';
                          } 

                          if ($row['status'] == 1 ) {
                          echo '<span class="badge badge-pill bg-gradient-danger" alt="s"> محذوف </span></td>';
                          }

                          if ($row['status'] == 2) {
                          echo '<span class="badge badge-pill bg-gradient-secondary"> غير متوفرة محجوزة </span></td>';
                          } 
                        ?>    
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