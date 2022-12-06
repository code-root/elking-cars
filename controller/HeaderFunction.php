<?php 
  function error_page($msg) {
    $style = '<style>
    html, body {
    height: 100%;
  }
  body {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-align-items: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-justify-content: center;
        -ms-flex-pack: center;
            justify-content: center;
  }
  
  .spinner {
    -webkit-animation: rotator 1.4s linear infinite;
            animation: rotator 1.4s linear infinite;
  }
  
  @-webkit-keyframes rotator {
    0% {
      -webkit-transform: rotate(0deg);
              transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(270deg);
              transform: rotate(270deg);
    }
  }
  
  @keyframes rotator {
    0% {
      -webkit-transform: rotate(0deg);
              transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(270deg);
              transform: rotate(270deg);
    }
  }
  .path {
    stroke-dasharray: 187;
    stroke-dashoffset: 0;
    -webkit-transform-origin: center;
        -ms-transform-origin: center;
            transform-origin: center;
    -webkit-animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
            animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
  }
  
  @-webkit-keyframes colors {
    0% {
      stroke: #4285F4;
    }
    25% {
      stroke: #DE3E35;
    }
    50% {
      stroke: #F7C223;
    }
    75% {
      stroke: #1B9A59;
    }
    100% {
      stroke: #4285F4;
    }
  }
  
  @keyframes colors {
    0% {
      stroke: #4285F4;
    }
    25% {
      stroke: #DE3E35;
    }
    50% {
      stroke: #F7C223;
    }
    75% {
      stroke: #1B9A59;
    }
    100% {
      stroke: #4285F4;
    }
  }
  @-webkit-keyframes dash {
    0% {
      stroke-dashoffset: 187;
    }
    50% {
      stroke-dashoffset: 46.75;
      -webkit-transform: rotate(135deg);
              transform: rotate(135deg);
    }
    100% {
      stroke-dashoffset: 187;
      -webkit-transform: rotate(450deg);
              transform: rotate(450deg);
    }
  }
  @keyframes dash {
    0% {
      stroke-dashoffset: 187;
    }
    50% {
      stroke-dashoffset: 46.75;
      -webkit-transform: rotate(135deg);
              transform: rotate(135deg);
    }
    100% {
      stroke-dashoffset: 187;
      -webkit-transform: rotate(450deg);
              transform: rotate(450deg);
    }
  }
    </style>
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
     <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
  </svg>';
  
    echo $style . $msg;
    echo '<script> goBack() </script>';
  
    exit;
  }

function HeaderTile ($title , $case) {
  $re = null;
  $one =  '
  <!DOCTYPE html>
  <html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="'. url_assetsUser().'img/apple-icon.png">
    <link rel="icon" type="image/png" href="'. url_assetsUser().'img/favicon.png">
    <title>'.NameSite.' | '.$title.'</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="'. url_assetsUser().'css/nucleo-icons.css" rel="stylesheet" />
    <link href="'. url_assetsUser().'css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="'. url_assetsUser().'css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="'. url_assetsUser().'css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  </head>
  <style>
    * {
    font-family: "Tajawal", sans-serif; }
  </style> ';
  
  $two = '<body class="g-sidenav-show  bg-gray-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
      <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../index.php">'.NameSite.' | '.$title.'</a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
    
        </div>
      </div>
    </nav>';

    if ($case == 1) {
      $re = $one . $two ; 
    }else {
      $re = $one ;
    }
    return $re;
}

function siteName() {
  $conn = db (IsConn);
  $usersSQL = "SELECT `nameWeb`  FROM `settings` WHERE id = 1 ";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    return $users['nameWeb'];
  }
  return 'Mostafa Elbagory';
} 


  function customerName($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT name  FROM `customers` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['name'];
    }
    return false;
  } 

  function payersSQL($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT payer  FROM `receipt` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['payer'];
    }
    return false;
  } 

function totalResidualAdmin () {
  $conn = db (IsConn);
  $Residual = 0;
  $sql = "SELECT SUM(Residual) FROM receipt";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();
  $Residual = $row['SUM(Residual)'];
  if ($Residual <= 0) {
    $Residual = 0;
  }
}
return $Residual ;
}

  function GetResidual($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT Residual  FROM `receipt` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['Residual'];
    }
    return false;
  } 

  function BranchName($UserId) {
    $conn = db (IsConn);
    $usersSQL = "SELECT `Full_name`  FROM `users` WHERE id = $UserId ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['Full_name'];
    }
    return false;
  } 

  function BranchUsername($UserId) {
    $conn = db (IsConn);
    $usersSQL = "SELECT `username`  FROM `users` WHERE id = $UserId ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['username'];
    }
    return false;
  } 



  function customerNum($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT `number`  FROM `customers` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['number'];
    }
    return false;
  } 

  

  function CarsCse ($UserIdLogin , $now) {
    $conn = db (IsConn);
    $sql = "SELECT id , carsID , ToDate  FROM `receipt`  where UserID = '$UserIdLogin'  ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $functionID = $row['id'];
        $ToDate =  $row['ToDate'];
        $carsID =  $row['carsID'];
        if ($now > $ToDate ) {
          $sql = "UPDATE `receipt` SET status=1 where id = '$functionID' ";
          $conn->query($sql);
          
          $sql_active = "SELECT active  FROM `cars`  where id = '$carsID'  ";
          $result_active = $conn->query($sql_active); 
          if ($result_active->num_rows > 0) {
            $active = $result_active->fetch_assoc();
            $is_active = $active['active'];
            if ($is_active != 1 ) {
              $sql = "UPDATE `cars` SET status= 0 where id = '$carsID' ";
              $conn->query($sql);
            }
          }
        }

      }
  }

}
    
    function GetReceipt ($UserIdLogin) {
    $conn = db (IsConn);
    $msg = 0 ;
      $sql = "SELECT SUM(payer) FROM receipt where UserID = '$UserIdLogin' ";
      $result = $conn->query($sql);
      if ($result->num_rows == 0) {
      $msg = 0;
      } else {
      $row = $result->fetch_assoc();
      $msg = $row['SUM(payer)'];
      }
      return $msg ;
    }

        
    function TotalReceipt ($UserIdLogin) {
      $conn = db (IsConn);
      $total = 0 ;
      $total =  GetReceipt($UserIdLogin) - TotalExpenses($UserIdLogin) - TotalOutlay($UserIdLogin);
        return $total ;
      }


      function GetReceiptAdmin () {
        $conn = db (IsConn);
        $msg = 0 ;
          $sql = "SELECT SUM(payer) FROM receipt ";
          $result = $conn->query($sql);
          if ($result->num_rows == 0) {
          $msg = 0;
          } else {
          $row = $result->fetch_assoc();
          $msg = $row['SUM(payer)'];
          }
          return $msg ;
        }

        function TotalOutlayAdmin () {
          $conn = db (IsConn);
          $msg = 0 ;
            $sql = "SELECT SUM(number_count) FROM `outlay`  ";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
            $msg = 0;
            } else {
            $row = $result->fetch_assoc();
            $msg = $row['SUM(number_count)'];
            }
            return $msg ;
          }

      function RecAdminTotal  () {
        $conn = db (IsConn);
        $total = 0 ;
        $total =  GetReceiptAdmin() - TotalExpensesALL() - TotalOutlayAdmin();
          return $total ;
      }


      function nagitive_check($value){
        if (isset($value)){
            if (substr(strval($value), 0, 1) == "-"){
            return true;
        } else {
            return false;
        }
            }
        }

      function TotalOutlay ($UserIdLogin) {
        $conn = db (IsConn);
        $msg = 0 ;
          $sql = "SELECT SUM(number_count) FROM `outlay` where UserID = '$UserIdLogin' ";
          $result = $conn->query($sql);
          if ($result->num_rows == 0) {
          $msg = 0;
          } else {
          $row = $result->fetch_assoc();
          $msg = $row['SUM(number_count)'];
          }
          return $msg ;
        }
        
    function TotalExpenses ($UserIdLogin) {
      $conn = db (IsConn);
      $msg = 0 ;
        $sql = "SELECT SUM(number_count) FROM `expenses` where UserID = '$UserIdLogin' ";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
        $msg = 0;
        } else {
        $row = $result->fetch_assoc();
        $msg = $row['SUM(number_count)'];
        }
        return $msg ;
      }

      function TotalExpensesALL () {
        $conn = db (IsConn);
        $msg = 0 ;
          $sql = "SELECT SUM(number_count) FROM `expenses` ";
          $result = $conn->query($sql);
          if ($result->num_rows == 0) {
          $msg = 0;
          } else {
          $row = $result->fetch_assoc();
          $msg = $row['SUM(number_count)'];
          }
          return $msg ;
        }
  


  function CarsBrand($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT Brand  FROM `cars` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['Brand'];
    }
    return false;
  } 

  function GetNameEmployee($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT name  FROM `employees` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['name'];
    }
    return false;
  } 
  

  function CarsModel($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT `Model`  FROM `cars` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['Model'];
    }
    return false;
  } 

  function CarsCategory($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT Category  FROM `cars` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['Category'];
    }
    return false;
  } 

  
  function lastSenOne($diff) {
    $lastSen = null ;
    if ($diff->y > 0) {
      $lastSen .= $diff->y.'سنة ';
    }
    if ($diff->m > 0) {
      $lastSen .= $diff->m.' شهر ';
    }
    if ($diff->d > 0) {
      $lastSen .=  $diff->d.' يوم ';
    }
    if ($diff->h > 0) {
      $lastSen .=  $diff->h.' ساعة ';
    }

    if ($diff->i > 0) {
      $lastSen .=  $diff->i.' دقيقة ';
    }

    if ($diff->s > 0) {
  //    $lastSen .=  $diff->s.' ثانية ';

    }
    return $lastSen;
  }  

  function lastSen($date) {
    $datetime1 = new DateTime(date('Y-m-d H:i:s', $date));
    $datetime2 = new DateTime(date('Y-m-d H:i:s'));
    $lastSen = '';
    $diff = $datetime1->diff($datetime2);
    return lastSenOne($diff);
  }

  

  function GetTimeOut ($customerId) {
    $conn = db (IsConn);
     $timeout_SQL = "SELECT time  FROM timeout where userID = '$customerId' ";
     $result_SQL = $conn->query($timeout_SQL);
     if ($result_SQL->num_rows > 0) { 
     $row_time = $result_SQL->fetch_assoc();
     return $row_time['time'];
     }else {
       return  null ;
     }
    
 }

 function DateBetween($One , $two ) {
  $date1_ts = strtotime($One);
  $date2_ts = strtotime($two);
  $diff = $date2_ts - $date1_ts;
  return round($diff / 86400);
//   $datetime1 = new DateTime($One);
//   $datetime2 = new DateTime($two);
//   $difference = $datetime1->diff($datetime2);
//  return $difference->d ;
 }


function arabicDate($time) {
  $months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
  $days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
  $am_pm = ['AM' => 'صباحاً', 'PM' => 'مساءً'];

  $day = $days[date('D', $time)];
  $month = $months[date('M', $time)];
  $am_pm = $am_pm[date('A', $time)];
  $date = $day . ' ' . date('d', $time) . ' - ' . $month . ' - ' . date('Y', $time) . '   ' . date('h:i', $time) . ' ' . $am_pm;
  $numbers_ar = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
  $numbers_en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

  return str_replace($numbers_en, $numbers_ar, $date);
}


function categoryGET ($id) {
  $conn = db (IsConn);
  $timeout_SQL = "SELECT name  FROM category where id = '$id' ";
  $result_SQL = $conn->query($timeout_SQL);
  if ($result_SQL->num_rows > 0) { 
  $row_time = $result_SQL->fetch_assoc();
  return $row_time['name'];
  }else {
    return  null ;
  }
} 

function CourseGET ($rand) {
  $conn = db (IsConn);
  $timeout_SQL = "SELECT name  FROM courses where rand = '$rand' ";
  $result_SQL = $conn->query($timeout_SQL);
  if ($result_SQL->num_rows > 0) { 
  $row_time = $result_SQL->fetch_assoc();
  return $row_time['name'];
  }else {
    return  null ;
  }
} 


function BlackListDelete($id ) {
  $conn = db (IsConn);
  $sql = "DELETE FROM wordfilter WHERE id=$id";
  $conn->query($sql);
}

function UpdateCarsTwo ($carsID) {
  $conn = db (IsConn);
  $sql = "UPDATE `cars` SET status=2 where id = '$carsID' ";
  $conn->query($sql);
}