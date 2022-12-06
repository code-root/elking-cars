<?php include '../layout/head.php';
      include '../layout/nav.php' ;

 if (isset($_GET['FunctionSuccess'])) {
    $functionID = filter_var($_GET['FunctionSuccess'], FILTER_SANITIZE_STRING);
         $sql = "UPDATE `users` SET status=0 where id = '$functionID' ";
         $conn->query($sql);
     }
     if (isset($_GET['FunctionWarning'])) {
        $functionID = filter_var($_GET['FunctionWarning'], FILTER_SANITIZE_STRING);
             $sql = "UPDATE `users` SET status=1 where id = '$functionID' ";
             $conn->query($sql);
         }
  ?> 
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>الفروع </h6>
              <a  href="add.php" class="btn btn-info">إضافة فرع جديد </a>

            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الإسم </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">username </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">password </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">رقم الهاتف </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">delete</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحالة</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php  $sql = "SELECT * FROM users  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID = $row['id'];
                          $img = $row['img'];
                          ?>
                    <tr>
                      <td><div class="d-flex px-2 py-1"><a href="<?=$row['username']?> "> <?=$row['Full_name']?> </a> </div></td>
                      <td>   <div class="d-flex px-2 py-1"> <?=$row['username']?></div></td>
                      <td>  <div class="d-flex px-2 py-1"> <?=$row['password']?></div></td>
                      <td>  <div class="d-flex px-2 py-1"> <?=$row['email']?></div></td>
                      <td>  <div class="d-flex px-2 py-1"> <?=$row['number']?></div></td>
                      
                      <?php
                      if ($row['status'] == 0) { ?>
                    <td><form action="" method="GET"><button type="submit" class="btn btn-warning "  name="FunctionWarning" value="<?=$functionID?>" >حذف </button> </form> </td>
                    <?php }else {?> 
                    <td><form action="" method="GET"><button type="submit" class="btn btn-dark "  name="FunctionSuccess" value="<?=$functionID?>" >استرجاع </button> </form> </td>
                      
                      <?php } ?>
                      <td><div class="d-flex px-2 py-1">
                      <?php if ($row['status'] == 0) { echo 'نشط'; }else { echo 'معطل';} ?> </div></td>

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