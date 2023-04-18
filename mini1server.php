<?php
// session_start();
// if(isset($_SESSION['rollno'])) { // check if user is logged in
//     $rollno = $_SESSION['rollno']; // get user's email from session
//     // query the database to get user's information
//     $conn = new mysqli('localhost', 'root', '', 'placementdb');
//     $sql = "SELECT * FROM register WHERE rollno='$rollno'";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//       $row = $result->fetch_assoc();
//       $first_name = $row['first_name'];
//       $last_name = $row['last_name'];
//       $rollno = $row['rollno'];
//     }}

session_start(); // start the session
if(isset($_SESSION['rollno'])) { // check if user is logged in
  $rollno = $_SESSION['rollno']; // get user's email from session
  // query the database to get user's information
  $conn = new mysqli('localhost', 'root', '', 'placementdb');
  $sql = "SELECT * FROM register WHERE rollno='$rollno'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $rollno = $row['rollno'];
    $_SESSION['rollno'] = $rollno;
      $sql2 = "SELECT * FROM details WHERE rollno='$rollno'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
      $row2 = $result2->fetch_assoc();
      $cpi = $row2['cpi'];
      $_SESSION['cpi'] = $cpi;
      $ctc = $row2['ctc'];
      $_SESSION['ctc'] = $ctc;
    }
    
  }



// initializing variables
$webmail="";
$mobile="";
$tenth= "";
$twelve="";
$cpi = "";
$transcript = "";
$age = "";
$branch = "";
$interest = "";
$year= "";
$placed = "";
$company="";
$ctc = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

// REGISTER USER
if (isset($_POST['details_user'])) {
  // receive all input values from the form
  $webmail= mysqli_real_escape_string($db, $_POST['webmail']);
  $mobile=mysqli_real_escape_string($db, $_POST['mobile']);
  $tenth = mysqli_real_escape_string($db, $_POST['tenth']);
  $twelve= mysqli_real_escape_string($db, $_POST['twelve']);
  $cpi = mysqli_real_escape_string($db, $_POST['cpi']);
  $transcript = mysqli_real_escape_string($db, $_POST['transcript']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $branch = mysqli_real_escape_string($db, $_POST['branch']);
  $interest = mysqli_real_escape_string($db, $_POST['interest']);
  $year = mysqli_real_escape_string($db, $_POST['year']);
  $placed = mysqli_real_escape_string($db, $_POST['placed']);
  $company =  mysqli_real_escape_string($db, $_POST['company']);
  $ctc = mysqli_real_escape_string($db, $_POST['ctc']);
 /*$img_name = $_FILES['my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_name = $_FILES['my_image']['tmp_name'];
$error= $_FILES['my_image']['error'];
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if($error === 0){
    if($img_size > 125000){
      $em = "your file is too large";
      header("Location: details.php?error=$em");
    }else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png");
      if(in_array($img_ex_lc, $allowed_exs)){
        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_;
        $img_upload_path = 'miniview/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
      }else{
        $em="you can't upload files of this type";
        header("Location: details.php?error=$em");
      }
    }
  }else{
    $em = "Unknown error occurred";
    header("Location: details.php?error=$em");
  }
*/
  
  if (empty($tenth)) { 
    array_push($errors, "Entry is required");
    echo "Entry is required"; 
  }
  if (empty($cpi)) { 
    array_push($errors, "Student's cpi is required");
    echo "Student's cpi is required"; 
  }
  if (empty($transcript)) { 
    array_push($errors, "Student's transcript is required");
    echo "Student's transcript is required"; 
  }
  if (empty($age)) { 
    array_push($errors, "Student's age is required"); 
    echo "Student's age is required";
  }
  if (empty($branch)) { 
    array_push($errors, "Specialization is required"); 
    echo "Specialization is required";
  }
  if (empty($interest)) { 
    array_push($errors, "Area of Interest is required");
    echo "Area of Interest is required"; 
  }
  if (empty($year)) { 
    array_push($errors, "Batch year is required");
    echo "Batch year is required"; 
  }
  if (empty($placed)) { 
    array_push($errors, "placement stats is required");
    echo "placement stats is required"; 
  }
  if (empty($ctc)) { 
    array_push($errors, "ctc is required");
    echo "if not placed take ctc as zero is required"; 
  }

  // first check the database to make sure 
  // a user does not already exist with the same email
//   $user_check_query = "SELECT * FROM register WHERE rollno='$rollno' LIMIT 1";
//   $result = mysqli_query($db, $user_check_query);
//   $user = mysqli_fetch_assoc($result);
  
//   if ($user) { // if user exists
//     if ($user['rollno'] === $rollno) {
//       array_push($errors, "Student already registered");
//     }
//   }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO details (rollno,webmail,mobno, tenth, twelve, cpi, transcript, age, branch, interest, year, placed, company,ctc) 
              VALUES('$rollno','$webmail','$mobile','$tenth', '$twelve','$cpi', '$transcript', '$age', '$branch', '$interest', '$year', '$placed','$comapny', '$ctc')";
    $q=mysqli_query($db, $query);
    if($q){
   
      echo "<script>
      alert('Inserted Successfully');
      window.location.href='miniview.php';
      </script>";
      $_SESSION['success'] = "You have submitted your details";
     }
      else{
        echo "<script>
      alert('Not Inserted');
      window.location.href='details.php';
      </script>";
      }
    // $_SESSION['success'] = "You have submitted your details";
    // header('location: miniview.php');
  }
}}
/*}else{
  header("Location:details.php");
}*/