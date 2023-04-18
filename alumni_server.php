<?php
session_start();
if(isset($_SESSION['rollno'])) { // check if user is logged in
    $rollno = $_SESSION['rollno']; // get user's email from session
    // query the database to get user's information
    $db= new mysqli('localhost', 'root', '', 'placementdb');
    $sql = "SELECT * FROM register WHERE rollno='$rollno'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    //   $first_name = $row['first_name'];
    //   $last_name = $row['last_name'];
      $rollno = $row['rollno'];
    }}
// initializing variables
$name= "";
$area = "";
$yearofpass="";
$position = "";
$organisation = "";
$ctc = "";
$location = "";
$startyear= "";
$endyear = "";
$currworking = ""; 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
  // receive all input values from the form
//   $rollno = mysqli_real_escape_string($db, $_POST['rollno']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $yearofpass=mysqli_real_escape_string($db,$_POST['yearofpass']);
  $area = mysqli_real_escape_string($db, $_POST['areaWork']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $organisation = mysqli_real_escape_string($db, $_POST['organisation']);
  $ctc = mysqli_real_escape_string($db, $_POST['ctc']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $startyear = mysqli_real_escape_string($db, $_POST['startyear']);
  $endyear = mysqli_real_escape_string($db, $_POST['endYear']);
  $currworking = mysqli_real_escape_string($db, $_POST['currworking']);

  $error=0;
  
  if (empty($name)) { 
    $error=1;
  }
  if (empty($area)) { 
    $error=1;
  }
 
  if (empty($location)) { 
    $error=1;
  }
  if (empty($startyear)) { 
    $error=1;
  }
  if (empty($currworking)) { 
    $error=1;
  }

  if ($error == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO `alumni`(`rollno`, `name`, `yearofpass`, `area`, `position`, `organisation`, `ctc`, `location`, `startyear`, `endYear`, `currworking`) VALUES ('$rollno','$name','$yearofpass','$area','$position','$organisation','$ctc','$location','$startyear','$endyear','$currworking')";
    $q=mysqli_query($db, $query);
   if($q){
   
    echo "<script>
    alert('Inserted Successfully');
    window.location.href='alumni_view.php';
    </script>";
    $_SESSION['success'] = "You have submitted your details";
   }
    else{
      echo "<script>
    alert('Your data already present');
    window.location.href='alumni_login.php';
    </script>";
    }
  }
}
/*}else{
  header("Location:details.php");
}*/