

<?php
session_start();

// initializing variables
$rollno = "";
$first_name = "";
$last_name = "";
$email = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $rollno = mysqli_real_escape_string($db, $_POST['rollno']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($rollno)) { 
    array_push($errors, "Roll Number is required");
    //echo "Roll Number is required"; 
  }
  if (empty($first_name)) { 
    array_push($errors, "First Name is required");
   // echo "First Name is required"; 
  }
  if (empty($last_name)) { 
    array_push($errors, "Last Name is required"); 
    //echo "Last Name is required";
  }
  if (empty($email)) { 
    array_push($errors, "WebMail is required"); 
    //echo "WebMmail is required";
  }
  if (empty($password)) { 
    array_push($errors, "Password is required");
   // echo "Password is required"; 
  }
  if (strlen($password)<6) { 
    array_push($errors, "Password length must be 6 atleast");
    //echo "Password length must be 6 atleast"; 
  }
  if ($password != $password_2) {
    array_push($errors, "The two passwords do not match");
    echo "The two passwords do not match";
  }

  //checking if email exist in database or not
  $emailquery=  " select * from register where email='$email' limit 1 ";
  $query = mysqli_query($db,$emailquery);
  
  //checking if that email exists more than once in db

  $emailcount = mysqli_num_rows($query);
  if($emailcount>0){
    echo "<script>
      alert('Email already exists!');
      window.location.href='sturegister.php';
      </script>";
     // $email_error= "Email already exists";
     $error=1;
  }

  // first check the database to make sure 
  // a user does not already exist with the same email
  $user_check_query = "SELECT * FROM register WHERE rollno='$rollno' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['rollno'] === $rollno) {
      array_push($errors, "Student already registered");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO register (rollno, first_name, last_name, email, password) 
              VALUES('$rollno','$first_name', '$last_name', '$email', '$password')";
    $q=mysqli_query($db, $query);
    if($q){echo "<script>
      alert('Registered successfully!');
      window.location.href='minilogin.php';
      </script>";
      $_SESSION['success'] = "You are now registered";}
    
    
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $rollno = mysqli_real_escape_string($db, $_POST['rollno']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($rollno)) {
    array_push($errors, "Roll Number is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM register WHERE rollno='$rollno' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['rollno'] = $rollno;
      if($results){
        echo "<script>
      alert('Logged in successfully!');
      window.location.href='stuwelcome.php';
      </script>";
     // $_SESSION['success'] = "You are now logged in";
      }
      //header('location: stuwelcome.php');
    } else {
      array_push($errors, "Wrong email/password combination");
      echo "<script>
      alert('Invalid id or password');
      window.location.href='minilogin.php';
      </script>";
    } 
}}
?>