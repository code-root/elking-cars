<?php include '../layout/head.php';
      include '../layout/nav.php' ;

 if (isset($_GET['FunctionSuccess'])) {
    $functionID = filter_var($_GET['FunctionSuccess'], FILTER_SANITIZE_STRING);
         $sql = "UPDATE `employees` SET status=0 where id = '$functionID' ";
         $conn->query($sql);
     }
     if (isset($_GET['FunctionWarning'])) {
        $functionID = filter_var($_GET['FunctionWarning'], FILTER_SANITIZE_STRING);
             $sql = "UPDATE `employees` SET status=1 where id = '$functionID' ";
             $conn->query($sql);
         }
  ?> 
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>قائمة الموظفين</h6>
              <a  href="add.php" class="btn btn-info">إضافة موظف جديد</a>

            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

              <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الإسم / الجنسية</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الرقم القومي</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">رقم الهاتف</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحساب البنكي</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">مكان الإقامة / البطاقة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ التسجيل</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">استرجاع</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">حذف</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحالة</th>

                    </tr>
                  </thead>
                  <tbody>
               <?php  $sql = "SELECT * FROM `employees` where UserID = '$UserIdLogin'  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID = $row['id'];
                          $image = $row['FileID'];
                          ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                      <a href="<?=url_upload()?>employees/<?=get_img($image)?>" target="_blank"> 
                      <img src="<?=url_upload()?>employees/<?=get_img($image)?>" class="avatar avatar-sm me-3" alt="user1">
                      </a>  
                                  </div>
                          <div class="d-flex flex-column justify-content-center">
                          <a href="record.php?code=<?=$functionID?>">    <h6 class="mb-0 text-sm"><?=$row['name']?> / <?=$row['nationality']?> </h6> </a>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['IDNumber']?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['number']?> / <?=$row['numderone']?> / <?=$row['numdertwo']?> </span></td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$row['AccountNumber']?></span>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$row['addressone']?> / <?=$row['addresstwo']?> </span>
                      </td>




                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=arabicDate($row['date']) ?> </span>
                          <p><?php echo date("Y/m/d", $row['date'])?></p>
                      </td>
                      <td><form action="" method="GET"><button type="submit" class="btn btn-success "  name="FunctionSuccess" value="<?=$functionID?>" >استرجاع </button> </form> </td>
                       <td><form action="" method="GET"><button type="submit" class="btn btn-warning "  name="FunctionWarning" value="<?=$functionID?>" >حذف </button> </form> </td>
                       <td>
                       <?php if ($row['status'] == 1 ) {
                          echo '<span class="badge badge-pill bg-gradient-warning" alt="s"> - </span></td>';
                         }else {
                          echo '<span class="badge badge-pill bg-gradient-success"> - </span></td>';
                        } ?>    
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