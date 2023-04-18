<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['rollno'])) {
  header('Location: minilogin.php');
  exit;
}

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'placementdb');

// Check if the connection was successful
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the user confirmed the deletion
  if ($_POST['confirm'] === 'yes') {
    // Delete the user's information from the "users" table
    $sql= "DELETE FROM details WHERE rollno = '".$_SESSION['rollno']."'";
    $result = mysqli_query($conn, $sql);

    // Destroy the session and redirect to the login page
    session_destroy();
    if($result){
      echo "<script>
      alert('Info Deleted Successfully');
      window.location.href='minilogin.php';
      </script>";
      //header("Location: alumni_info.php"); 
      
  }
  else {
      echo "<script>
      alert('Your profile is not deleted!');
      window.location.href='miniview.php';
      </script>";
  }
  //   header('Location: minilogin.php');
  //   exit;
  // } else {
  //   // Redirect to the profile page
  //   header('Location: minilogin.php');
  //   exit;
  // }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Account</title>
</head>
<body>
  <h1>Delete Account</h1>
  <p>You want to delete? </p>
  <form method="post">
    <label for="confirm-yes">Yes</label>
    <input type="radio" id="confirm-yes" name="confirm" value="yes"><br>

    <label for="confirm-no">No</label>
    <input type="radio" id="confirm-no" name="confirm" value="no" checked><br>

    <input type="submit" value="Delete">
  </form>
</body>
</html>
