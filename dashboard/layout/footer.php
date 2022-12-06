  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
        <li class="nav-item">
   

          <a href="<?=URL?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
          الصفحة الرئيسية
          </a>
          <a href="<?=URL?>about-me.php" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
          من نحن
          </a>
          <a href="<?=URL?>services.php" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
          خدماتي
          </a>
          <a href="<?=URL?>portfolio.php" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
          معرض الأعمال
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="https://www.behance.net/abdulazizstudio target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-behance"></span>
          </a>
          <a href="https://mobile.twitter.com/abdulazizstudio" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="https://www.instagram.com/abdulazizstudio/" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <!-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a> -->
          <!-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a> -->
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            جميع الحقوق محفوظة لـ © <script>
              document.write(new Date().getFullYear())
            </script> <?=NameSite?>.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script src="<?=url_assets()?>js/core/popper.min.js"></script>
  <script src="<?=url_assets()?>js/core/bootstrap.min.js"></script>
  <script src="<?=url_assets()?>js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=url_assets()?>js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="<?=url_assets()?>js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>