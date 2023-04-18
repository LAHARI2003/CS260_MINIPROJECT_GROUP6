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
  <title>Create Password</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

  <style>
    body {
background-color: #002D72;
display: flex;
justify-content: center; 
/* align-items: center;
height: 100vh;
/* marg
in: 0; */
}
.formm{
  /* justify-content: center; */
  margin-top:50px;
}
.header{
  margin-top:0px;
   width:400px;
}
</style>


  <?php
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

//echo $_GET['email'];
//echo $_GET['resetToken'];
//echo "jasmine";
if(isset($_GET['email']) && isset($_GET['resetToken'])){
   $email= $_GET['email'];
   $resetToken=$_GET['resetToken'];

    date_default_timezone_set('Asia/kolkata');
    $date=date("Y-m-d");
    $query = "SELECT * FROM register WHERE email='$email' AND resetToken='$resetToken' AND tokenExpired='$date'";
    $res= mysqli_query($db,$query);
    if($res){
       if(mysqli_num_rows($res)==1){
        ?>

       
  <form class="formm" method='post' action='' name='update'>


    
  <div class='header'>
  	<h2>Create Your Password Here</h2>
  </div>
         <div class='input-group'>
           <label>New Password</label>
           <input type='password' name='password'>
           <span class="text-danger" ><?php echo '<br>'; if (empty($pass)) echo "This field is required"; ?></span>
         </div>
     
           <div class='input-group'>
           <label>Confirm Password</label>
           <input type='password' name='cpassword'>
           <span class="text-danger" ><?php echo '<br>'; if (empty($cpass)) echo "This field is required"; ?></span>
         </div>

         <div class='btn_container'>
           <button type='submit' class='btn' name='respass'>Submit</button>
         </div>

         <div class='input-group'>
           <input type='hidden'  name='email' value="<?php echo $email;?>">
         </div>
     </form>
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


    <!-- php continued -->
     <?php

       }
      
       else{
        echo "<script>
        alert('Invalid or Expired Link');
        window.location.href='updatepassword.php';
        </script>";
    }
       
    }
    

else{
  //echo "Server Down! try again later";
  echo "<script>
  alert('Server Down! try again later');
  window.location.href='updatepassword.php';
  </script>";
}


}

//NOW UPDATING

?>

<?php
if(isset($_POST['respass']) && isset($_POST['email']) ){
 echo "clicked";
 $email=$_POST['email'];
 //echo $email;
 $pass=mysqli_real_escape_string($db,$_POST['password']);
 $cpass=mysqli_real_escape_string($db,$_POST['cpassword']);
 if($pass!=$cpass){
  echo "<script>
  alert('Passwords do not match');
  window.location.href='updatepassword.php';
  </script>";

 }
$pass=md5($pass);
echo $pass;
$sql="UPDATE `register` SET `password`='$pass',`resetToken`= NULL,`tokenExpired`= NULL WHERE email='$email'";
$que = mysqli_query($db,$sql);
if($que){
  echo "<script>
  alert('Password Updated Successfully');
  window.location.href='alumni_login.php';
  </script>";
}
else{
  echo "<script>
  alert('Cannot Update Password!');
  window.location.href='updatepassword.php?email=$email&resetToken=$resetToken';
  </script>";
}
}
?>
</body>
</html>