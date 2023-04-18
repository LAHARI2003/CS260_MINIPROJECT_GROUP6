<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'placementdb');

$errors = array(); 

if (isset($_POST['tpc_user'])) {
  $empid = mysqli_real_escape_string($db, $_POST['empid']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($empid)) {
    array_push($errors, "Employee Id is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  
  if (count($errors) == 0) {
    // $password = md5($password);
    $query = "SELECT * FROM tpclogin WHERE empid='$empid' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['empid'] = $empid;
      echo "<script>
      alert('Logged in successfully!');
      window.location.href='tpcview.php';
      </script>";
      // header('location: tpcview.php');
    } else {
      array_push($errors, "Wrong email/password combination");
      echo "<script>
      alert('Invalid id or password');
      window.location.href='tpclogin.php';
      </script>";
    } 
}}
?>