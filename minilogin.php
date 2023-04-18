<?php 
include('miniserver.php')
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
  display: flex;
}
</style>
<div>
<div class="header">
  	<h2>Login</h2>
  </div>
  
	 
  <form class="formm" method="post" action="minilogin.php">

  

  	<div class="input-group">
  		<label>Roll No</label>
  		<input type="text" name="rollno" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="btn_container">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet registered? <a href="sturegister.php">Sign up</a>
      &emsp;
      <a href="stuforgotpass.php"> Forgot Password?</a> 
  	</p>
     <?php $errors = array(); ?>
    <?php if (count($errors) > 0) : ?>
    <div class="error">
      <?php foreach ($errors as $error) : ?>
        <p><?php echo $error ?></p>
      <?php endforeach ?>
    </div>
    <?php endif ?>
     
    
    
  </form>
      </div>
</body>
</html>
