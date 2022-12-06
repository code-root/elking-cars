
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>

<script src="<?=url_assetsUser()?>js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=url_assetsUser()?>js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?=url_assetsUser()?>js/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?=url_assetsUser()?>js/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?=url_assetsUser()?>js/plugins/datatables/jszip.min.js"></script>
        <!-- <script src="<?=url_assetsUser()?>js/plugins/datatables/pdfmake.min.js"></script> -->
        <script src="<?=url_assetsUser()?>js/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?=url_assetsUser()?>js/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?=url_assetsUser()?>js/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?=url_assetsUser()?>js/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?=url_assetsUser()?>js/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?=url_assetsUser()?>js/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <!-- Datatable init js -->
        <script src="<?=url_assetsUser()?>js/datatables.init.js"></script>
        
        <?php
         if (is_file('../main.php')) {
          include '../main.php';
         }else {
          include '../../main.php';
       }
        
 ?> 
        
<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-end">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                <a href="<?=DashboardUser()?>" class="font-weight-bold" target="_blank"><?=NameSite?></a>
               Development <a href="https://smartagent-com.com/"> Smart Agent</a>  <i class="fa fa-heart"></i>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="<?=DashboardUser()?>" class="nav-link text-muted" target="_blank">الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                  <a href="<?=DashboardUser()?>customers/" class="nav-link text-muted" target="_blank">العملاء</a>
                </li>
                <li class="nav-item">
                  <a href="<?=DashboardUser()?>collectors/" class="nav-link text-muted" target="_blank">الإيرادات</a>
                </li>
                <li class="nav-item">
                  <a href="<?=DashboardUser()?>cars/" class="nav-link pe-0 text-muted" target="_blank">العربيات</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-end">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-start mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-end">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
      </div>
    </div>
  </div>

  

  <script src="<?=url_assetsUser()?>js/core/popper.min.js"></script>
  <script src="<?=url_assetsUser()?>js/core/bootstrap.min.js"></script>
  <script src="<?=url_assetsUser()?>js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=url_assetsUser()?>js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?=url_assetsUser()?>js/plugins/fullcalendar.min.js"></script>
  <script src="<?=url_assetsUser()?>js/plugins/chartjs.min.js"></script>

  <!-- <script src="<?=url_assetsUser()?>assets/js/plugins/choices.min.js"></script> -->
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=url_assetsUser()?>js/soft-ui-dashboard.min.js?v=1.0.3"></script>

</body>

</html>