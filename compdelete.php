<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['jobid'])) {
  header('Location: complogin.php');
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
    $sql = "DELETE FROM company WHERE jobid = '".$_SESSION['jobid']."'";
    $result = mysqli_query($conn, $sql);

    // Destroy the session and redirect to the login page
    session_destroy();
    header('Location: complogin.php');
    exit;
  } else {
    // Redirect to the profile page
    header('Location: complogin.php');
    exit;
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
