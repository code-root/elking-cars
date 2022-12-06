<?php
session_start();
date_default_timezone_set('Africa/Cairo');
//if (!isset($view_head) ) {  echo 'You do not have permission to view the content';  exit ; } 
include_once 'conn.php';
include_once 'HeaderFunction.php';

define('NameSite',siteName());
function isLoginAdmin() {
  if (empty($_SESSION['name']) && empty($_SESSION['customerId'])) {
    try {
      @session_destroy();
      unset($_SESSION["customerId"]);
      unset($_SESSION["name"]);
    } catch (Exception $e) {
      return 'The session has expired redirected ...';
    }
  } else {

    if (isset($_SESSION['name'])) {
      validateInput($_SESSION['name']);
    }
    if (isset($_SESSION['customerId'])) {
      validateInput($_SESSION['customerId']);
    }
    return true;
  }
}

function get_img($rand) {
  $conn = db (IsConn);
  $sql = "SELECT file  FROM uploadedfile where rand ='$rand'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $img = $row_img['file'];
  }

  if ($result_img->num_rows == 0 or isset($img) == '') {
    $img = 'root.png';
  }
  return  $img;
}

function Logo_img($conn) {
  $conn = db (IsConn);
  $sql = "SELECT logo  FROM admin where id = 1";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $id_img = $row_img['logo'];
    $img = get_img($id_img);
    $img = url_assets() . 'img/profile/' . $img;
  }
  if ($result_img->num_rows == 0 or isset($img) == '') {
    return 'http://farboutique.com/pinterest_profile_image.png';
  }
  return  $img;
}



function rand_set() {
  $chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  $sn = '';
  $max = count($chars)-1;
  for($i=0;$i<5;$i++){
       $sn .= (!($i % 5) && $i ? '' : '').$chars[rand(0, $max)];
       }
       return $sn ;
} 


function GetCustomersID($CustomersID) {
  $conn = db (IsConn);
  $name =  null ;
  $number =   null ;
  $usersSQL = "SELECT id , name , number  FROM `customers` WHERE id = $CustomersID ";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    $name =  $users['name'];
    $number =  $users['number'];
    $CustomersID =  $users['id'];

  }
  return json_encode(['CustomerInfo' => $name . ' ' . $number  , 'CustomersID' => $CustomersID ]);
}

function GetCarsID($CarsID) {
  $conn = db (IsConn);
  $Brand =  null ;
  $color =   null ;
  $Model =  null ;
  $Plate =  null ;
  $usersSQL = "SELECT id , Brand , color , Model , Plate   FROM `cars` WHERE id = $CarsID ";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    $Brand =  $users['Brand'];
    $color =  $users['color'];
    $Model =  $users['Brand'];
    $Plate =  $users['Plate'];
    $CarsID =  $users['id'];

  }
  return json_encode(['CarsInfo' => $Brand . ' ' . $color . ' ' . $Model . ' ' . $Plate , 'CarsID' => $CarsID ]);
}


      function title_page($title_page) {

        if (is_file('../layout/header.php')) {
          require_once '../layout/header.php';
        } elseif (is_file('../../layout/header.php')) {
          require_once '../../layout/header.php';
        } else {
          require_once 'layout/header.php';
        }
      
        $title = NameSite .' | ';
        $title .= $title_page;
        echo '<title>' . $title . '</title></head>';
        if (is_file('../layout/navbar.php')) {
          require_once '../layout/navbar.php';
        } elseif (is_file('../../layout/navbar.php')) {
          require_once '../../layout/navbar.php';
        } else {
          require_once 'layout/navbar.php';
        }
      }