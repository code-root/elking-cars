<?php
$db = 0;

function db ($db) {

        if ($db == 1) {
            $servername = "localhost:3308";
            $username = "root";
            $password = "";
            $dbname = "ksa";
        } else {
          $servername = "localhost";
          $username = "sofa_apiEL";
          $password = 'sofa100200#BD';
          $dbname = "elkingDB";
        }

     @ $conn = mysqli_connect( $servername, $username , $password , $dbname );
    
     if (!$conn) {
            $error_msg =  'Failed to connect to MySQL';
            $message =  'An unexpected error occurred .. Please contact the management of the Smart Agent  Development to fix the problem';
            $nu =  '+201001995914';
            echo json_encode(['error'=>$error_msg,'msg'=>$message , 'number' => $nu ]);
            exit();
          }else{ 
            $conn->set_charset('utf8');
            return $conn; 
          }
  }
       
  define('IsConn', $db);
  $conn = db (IsConn);

  if (IsConn == 1) {
  $URL_IS = 'http://localhost/ksa/';
  $emailRE = 'smartagent-com.com';
  }else {
  $emailRE = 'elking-cars.com/';
  $URL_IS = 'https://elking-cars.com/';

  }

  define('URL', $URL_IS);
  
  function url_ajax() {
    return URL . "controller/ajax/";
  }
  
  function url_Dashboard() {
    
    return URL . "dashboard/";

  }

  function url_assets() {
    return URL . "assets/";
  }

  function url_upload() {
    return URL . "upload/";
  }
  
  function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    $data = htmlspecialchars($data);
    return $data;
  }

    function dashboard() {

      return URL . "dashboard/admin/";
  
    }
    

    function DashboardUser() {
      return URL . "dashboard/user/";
    }
    
    function url_assetsUser() {
      return URL . "dashboard/assets/";
    }
    
 
    function logo() {
      return URL . "logo.png";
    }

    $logo = logo();
    

    
  $dashboard = dashboard();
  $now =  strtotime('now') ; 
  $time_c = date("Y-m-d"); 
  $nowYear =  strtotime($time_c) ; 


  function UpdateAdmin($user , $now , $status) {
    $conn = db (IsConn);
    $UpdateAdmin = "INSERT INTO `update-admin` (`username`, `time`, `status`) VALUES ('$user', '$now', '$status')";
    $conn->query($UpdateAdmin);
  }


