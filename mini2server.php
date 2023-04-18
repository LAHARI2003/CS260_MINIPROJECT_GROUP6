

<?php
session_start();

// initializing variables
$jobid = "";
$company = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

// REGISTER USER
if (isset($_POST['compreg_user'])) {
  // receive all input values from the form
  $jobid = mysqli_real_escape_string($db, $_POST['jobid']);
  $company = mysqli_real_escape_string($db, $_POST['company']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($jobid)) { 
    array_push($errors, "Job ID is required");
    // echo "Job ID is required"; 
  }
  if (empty($company)) { 
    array_push($errors, "Company is required");
    // echo "Company is required"; 
  }
  if (empty($password)) { 
    array_push($errors, "Password is required");
    // echo "Password is required"; 
  }
  if (strlen($password)<6) { 
    array_push($errors, "Password length must be 6 atleast");
    //echo "Password length must be 6 atleast"; 
    echo "<script>
        alert('Password length must be 6 atleast');
        window.location.href='compreg.php';
        </script>";
  }
  if ($password != $password_2) {
    array_push($errors, "The two passwords do not match");
    //echo "The two passwords do not match";
    echo "<script>
        alert('The two passwords do not match');
        window.location.href='compreg.php';
        </script>";
  }

  // first check the database to make sure 
  // a user does not already exist with the same email
  $user_check_query = "SELECT * FROM compreg WHERE jobid='$jobid' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['jobid'] === $jobid) {
      array_push($errors, "Employer already registered");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO compreg (jobid, company, password) 
              VALUES('$jobid', '$company', '$password')";
    $q=mysqli_query($db, $query);
    if($q){
      $_SESSION['success'] = "You are now registered";
      $_SESSION['jobid'] =$jobid;
      echo "<script>
        alert('Registered successfully');
        window.location.href='complogin.php';
        </script>";
        
    }
    else{
      echo "<script>
        alert('Account Already Present, Please Signin');
        window.location.href='compreg.php';
        </script>";
    }
    //header('location: complogin.php');
  }
}
// LOGIN USER
if (isset($_POST['complogin_user'])) {
  $jobid = mysqli_real_escape_string($db, $_POST['jobid']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($jobid)) {
    array_push($errors, "Job ID is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM compreg WHERE jobid='$jobid' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['jobid'] = $jobid;
      echo "<script>
        alert('Logged in successfully');
        window.location.href='compview.php';
        </script>";

      //header('location: compview.php');
    } else {
      array_push($errors, "Wrong email/password combination");
      //echo "invalid jobid or password";
      echo "<script>
        alert('Invalid jobid or password');
        window.location.href='complogin.php';
        </script>";

    } 
}}
?>