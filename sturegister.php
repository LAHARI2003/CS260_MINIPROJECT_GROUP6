<?php 
  include('miniserver.php');
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $password = $_POST["password"];
  if(!preg_match('/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/', $password)) {
    echo "<script>alert('Password must be at least 8 characters long, contain at least special, and uppercase letter');</script>";
  }
}
?>
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
  margin-left:50px;
  display: flex;
  }
</style>
<div>
<div class="header">
    <h2>Register</h2>
  </div>
    
  <form class="formm" method="post" action="sturegister.php">

  

 <?php $errors = array(); // Initialize $errors as an empty array ?>
    <?php if (count($errors) > 0) : ?>
      <div class="error">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
      </div>
    <?php endif ?>
    <div class="input-group">
      <label>Roll No</label>
      <input type="text" name="rollno" value="">
      <span class="text-danger" ><?php if (empty($rollno)) echo "Required"; ?></span>
      
    </div>
    <div class="input-group">
      <label>First Name</label>
      <input type="text" name="first_name" value="<?php echo $first_name; ?>">
      <span class="text-danger" ><?php if (empty($first_name)) echo "Required"; ?></span>
    </div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="last_name" value="<?php echo $last_name; ?>">
      
    </div>
    <div class="input-group">
      <label>WebMail</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
      <span class="text-danger" ><?php if (empty($email)) echo "Required"; ?></span>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
      <span class="text-danger" ><?php if (empty($password)) echo "Required"; ?></span>
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <div class="btn_container">
      <button type="submit" class="btn" name="reg_user">Register</button>
      <span class="text-danger" ><?php if (empty($password_2)) echo "Required"; ?></span>
    </div>
    <p>
      Already registered? <a href="minilogin.php">Sign in</a>
    </p>
  </form>
        </div>
        <script type="text/javascript">
  function validatePassword() {
    var password = document.getElementById("password").value;
    var regex = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;
    if(!regex.test(password)) {
      alert("Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
      return false;
    }
    return true;
  }
  document.getElementsByTagName("form")[0].onsubmit = validatePassword;
</script>
</body>
</html>