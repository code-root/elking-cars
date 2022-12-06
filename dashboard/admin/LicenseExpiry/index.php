<?php include '../layout/head.php';
      include '../layout/nav.php' ;
  ?> 

  <body>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>حالة الرخص وعقود  العربيات </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

              <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الفرع</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الماركة / الموديل</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الفئة / اللون</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ انتهاء الرخصة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">نهاية عقد السيارة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> حالة الرخصة </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> حالة العقد </th>

                    </tr>
                  </thead>
                  <tbody>
               <?php
                $x = 0;
               $sql = "SELECT * FROM `cars`  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $LicenseExpiration_one =  $row['LicenseExpiration'] ;
                          $LicenseExpiration =  strtotime($LicenseExpiration_one);
                          $checkNow  = $now - 50 ; 

                          if ($LicenseExpiration < $now ) {
                              $License = 'إنتهت الرخصة ';
                              $License_case = 1 ;
                          }else {
                              $License_case = 0 ;
                              $License = lastSen($LicenseExpiration);
                          } 

                          $ExitDate_one =  $row['ExitDate'] ;
                          $ExitDate_two =  strtotime($ExitDate_one);
                          if ($ExitDate_two < $now ) {
                              $ExitDate = 'إنتهت مدة العقد ';
                              $ExitDate_case = 1 ;
                          }else {
                            $ExitDate_case = 0 ;
                              $ExitDate = lastSen($ExitDate_two);
                          } 

                          
                          $x ++;
                          $functionID = $row['id'];
                          $image = $row['FileID'];
                          $UserId = $row['UserId'];

                          ?>
                    <tr>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$x?></span></td>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">  <?php echo BranchName($UserId)?></span></td>
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
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['Category']?>  / <?=$row['color']?>  </span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$License?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$ExitDate?></span></td>
                       <?php 
                          if ($License_case == 1) {
                          echo '<td><span class="badge badge-pill bg-gradient-danger"> أنتهت الرخصة  </span></td>';
                          }else { ?>
                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$LicenseExpiration_one?></span></td>
                              
                       <?php } if ($ExitDate_case == 1 ) {
                          echo '<td><span class="badge badge-pill bg-gradient-danger">إنتهت مدة العقد  </span></td>';
                          }else { ?>
                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$ExitDate_one?></span></td>
                           <?php } ?>    
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