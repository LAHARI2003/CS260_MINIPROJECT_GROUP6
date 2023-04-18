<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
<style>
    body {
background-color: #002D72;
background-image: url("background.jpg");
display: flex;
justify-content: center; 
/* align-items: center;
height: 100vh;
/* marg
in: 0; */
}
.formm{
  /* justify-content: center; */
  margin-top:0px;
  width: 400px;
}
.header {
    width: 400px;
    margin: 50px auto 0px;
    color: white;
    background: #002D72;

    text-align: center;
    border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding: 20px;
  }
  .btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #002D72;
    border: none;
    border-radius: 5px;
  }
  .btn_container{
  justify-content: center; 
  
  display: flex;
  }
</style>
  <div>
  <div class="header">
    <h2>Login</h2>
  </div>
  <form class="formm" method="post" action="admin1.php">
    <label for="webmail">Webmail:</label>
    <input type="email" id="webmail" name="webmail" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <div class="btn_container">
      <button type="submit" class="btn" name="submit">Login</button>
    </div>
    <p> &emsp;</p>
    <a href='fpassadmin.php'> Forgot Password?</a>
  </form>
</div>
</body>
</html>

<?php
$user_webmail = "";
$user_password = "";
  // Define the predefined webmail and password
  $predefined_webmail = 'baddi_2101cs16@iitp.ac.in';
  $predefined_password = 'iitp@123';
  
  // Get the user's webmail and password from the form submission
  if (isset($_POST['submit'])) {
    // receive all input values from the form
    
  $user_webmail = $_POST['webmail'];
  $user_password = $_POST['password'];
  
  // Check if the webmail and password are correct
  if ($user_webmail === $predefined_webmail && $user_password === $predefined_password) {
    // Login is successful, redirect to admin dashboard
    echo "<script>
      alert('Logged in successfully!');
      window.location.href='adminwelcome.php';
      </script>";
      $_SESSION['success'] = "You are now logged in";
    exit();
  } else {
    // Login is unsuccessful, display an error message
    echo "Invalid webmail or password.";
  }}
?>