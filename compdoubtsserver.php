<?php

session_start(); // start the session
if(isset($_SESSION['jobid'])) { // check if user is logged in
  $jobid= $_SESSION['jobid']; // get user's email from session
  // query the database to get user's information
  echo $jobid;
  $conn = new mysqli('localhost', 'root', '', 'placementdb');
  $sql = "SELECT * FROM compreg WHERE jobid='$jobid'";
  $result = $conn->query($sql);
//   if($result){
//     echo "jas";
//   }
echo $result->num_rows ;
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $comp_name = $row['company'];
    $jobid= $row['jobid'];
   
    
  }



// initializing variables
$query= "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

// REGISTER USER
if (isset($_POST['querycomp_user'])) {
  // receive all input values from the form
  $query = mysqli_real_escape_string($db, $_POST['query']);
  

  
  if (empty($query)) { 
    array_push($errors, "Query is required");
    echo "Query is required"; 
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
   //encrypt the password before saving in the database

    $sql = "INSERT INTO `compquerydb`(`jobid`, `comp_name`, `query`) VALUES ('$jobid','$comp_name','$query')";
    $q=mysqli_query($db, $sql);
    if($q){
        echo "<script>
        alert('Queries Submitted Successfully');
        window.location.href='compview.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Cannot Insert');
        window.location.href='compdoubts.php';
        </script>";
    }
    // $_SESSION['success'] = "You have submitted your details";
    // header('location: stuwelcome.php');
  }
}}
/*}else{
  header("Location:details.php");
}*/