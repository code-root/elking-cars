<?php include '../layout/head.php';
include '../layout/nav.php';
$rand = rand_set();
$_SESSION['files_rand'] = $rand;
$_SESSION['file'] = 'users';
$password = strtolower($rand ) . 'cars';
$usernameRand = strtolower($rand ) . '';
$nameLogin = $_SESSION['name'] ;
$username = explode(" ", $nameLogin);

$username = $username[0].$usernameRand
?>
<!-- End Navbar -->
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1"> <?php if (isset($_SESSION['name'])) {
                                            echo ($_SESSION['name']);
                                        } ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">إضافة فرع جديد</h6>
                </div>
                <div class="card-body p-2">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder"> بيانات الفرع </h6>
                    <form id="add">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="name" placeholder="إسم الفرع">
                                </div>
                                <label> إسم المستخدم </label>

                                <div class="form-group">
                                    <input type="username" class="form-control" value="<?=$username?>" name="username" placeholder="username">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="email">
                                </div>

                            </div>
                            <!-- categoryID	name	lecturer	desc	image	degree	status	date -->
      
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                            <div class="form-group">
                                <label> كلمة المرور </label>
                                    <input type="txt" class="form-control" name="password" value="<?=$password?>" placeholder="password">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" name="number" placeholder="number">
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
            $(document).ready(function() {
                $('.add').click(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: '<?= url_ajax() ?>admin/powers/add.php',
                        data: $('#add').serialize(),
                        dataType: 'json',
                        success: function(data) {
                            if (data.code == 200) {
                                swal(data.msg, "", "success", {
                                    button: "حسنا ",
                                });
                                setTimeout(function() {
                                    window.location.href = 'index.php';
                                }, 3000);
                            } else {
                                swal(data.msg, "", "error", {
                                    button: "حسنا ",
                                });
                            }
                            console.log(data);
                        }
                    });
                });
            });


        </script>