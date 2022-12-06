
<body class="g-sidenav-show rtl bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php" target="_blank">
        <img src="https://e7.pngegg.com/pngimages/617/488/png-clipart-computer-icons-user-profile-avatar-avatar-heroes-monochrome-thumbnail.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="me-1 font-weight-bold"><?php  if (isset($_SESSION['name'])) {echo($_SESSION['name']); } ?></span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="<?=dashboard()?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text me-1">الرئيسية</span>
          </a>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#expenses" class="nav-link " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <span class="nav-link-text ms-1">المصروفات</span>
          </a>
          <div class="collapse " id="expenses">
            <ul class="nav ms-4 ps-3">
            
            <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>expenses/index.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> عرض </span>
                </a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>expenses/add.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> إضافة </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
 

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <span class="nav-link-text ms-1">سجل سداد</span>
          </a>
          <div class="collapse " id="componentsExamples">
            <ul class="nav ms-4 ps-3">
            
            <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>collectors/receipt-index.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> عرض </span>
                </a>
              </li>
             
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#employees" class="nav-link " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <span class="nav-link-text ms-1">الموظفين</span>
          </a>
          <div class="collapse " id="employees">
            <ul class="nav ms-4 ps-3">
            
            <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>employees/index.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> قائمة الموظفين </span>
                </a>
              </li>

            <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>employees/outlay-index.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> مصاريف الموظفين </span>
                </a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>employees/outlay.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> إضافة </span>
                </a>
              </li>
            </ul>
          </div>
        </li>


        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#collectors" class="nav-link " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <span class="nav-link-text ms-1">الإيرادات</span>
          </a>
          <div class="collapse " id="collectors">
            <ul class="nav ms-4 ps-3">
          
            <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>collectors/index.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> عرض </span>
                </a>
              </li>

            <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>collectors/payer.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> سداد المتبقي </span>
                </a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>collectors/add.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> إضافة </span>
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>collectors/duration-index.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> سجل تمديد المدة  </span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#customers" class="nav-link " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <span class="nav-link-text ms-1">العملاء</span>
          </a>
          <div class="collapse " id="customers">
            <ul class="nav ms-4 ps-3">
            
            <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>customers/index.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> عرض </span>
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>customers/add.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> إضافة </span>
                </a>
              </li>
             
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#cars" class="nav-link " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <span class="nav-link-text ms-1">العربيات</span>
          </a>
          <div class="collapse " id="cars">
            <ul class="nav ms-4 ps-3">
            
            <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>cars/index.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> عرض </span>
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link " href="<?=dashboard()?>cars/add.php">
                  <span class="sidenav-mini-icon">  </span>
                  <span class="sidenav-normal"> إضافة </span>
                </a>
              </li>
             
            </ul>
          </div>
        </li>

        
        <li class="nav-item">
          <a class="nav-link " href="<?=dashboard()?>LicenseExpiry/index.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                        <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text me-1"> إنتهاء الرخصة </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="<?=dashboard()?>powers/index.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                        <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text me-1">الصلاحيات</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="<?=url_Dashboard()?>logout.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                        <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text me-1">تسجيل الخروج</span>
          </a>
        </li>
        


      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
            <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-dark" href="javascript:;">لوحات القيادة</a></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar">
         
          <ul class="navbar-nav me-auto ms-0 justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?php  if (isset($_SESSION['name'])) {echo($_SESSION['name']); } ?></span>
              </a>
            </li>
            <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->