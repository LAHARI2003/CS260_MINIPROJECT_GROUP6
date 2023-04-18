<?php
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$resetToken){
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jasmineshrivastava1909@gmail.com';                     //SMTP username
        $mail->Password   = 'zepxmthyitkqhqxu';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->SMTPSecure ='tls';
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('jasmineshrivastava1909@gmail.com', 'TPC IIT Patna');
        $mail->addAddress($email);     //Add a recipient
        
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link from TPC Portal IIT Patna';
        $mail->Body    = "We got a request from you to reset your password--
        
        Click the link below: <br>
        <a  href='http://localhost/mini2/stuupdatepassword.php?email=$email&resetToken=$resetToken'> Reset Password </a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
}
$email="";
if(isset($_POST['send-reset-link'])){
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $error=0;
    if(empty($email)){
        $error=1;
    }
    if($error==0){
    $query="SELECT * FROM register where email='$email'";
    $result=mysqli_query($db,$query);
    if($result){
     if(mysqli_num_rows($result)==1){
           //echo "00";
        
            $resetToken=bin2hex(random_bytes(16));
          //echo $resetToken;
            date_default_timezone_set('Asia/kolkata');
            $date=date("Y-m-d");
            $query= "UPDATE register SET resetToken='$resetToken',tokenExpired='$date' where email='$_POST[email]'";
            //echo sendMail($_POST['email'],$reset_token);
            // $headers ="From: jasmineshrivastava1909@gmail.com";
            // $subject ="Password Reset";
            // $body ="Click the link";
            if(mysqli_query($db,$query) && sendMail($_POST['email'],$resetToken)){
              //$_SESSION['emaill']=$email;
              echo "<script>
               alert('Password Reset Link sent to your email');
               window.location.href='forgotpass.php';
               </script>";
            }
            else{
                //echo "Server Down! try again later";
                echo "<script>
                alert('Server Down! try again later');
                window.location.href='forgotpass.php';
                </script>";
            }

     }
     else {
        echo "<script>
                alert('Email not Found!');
                window.location.href='forgotpass.php';
                </script>";
     }
    }
    else{
        echo "<script>
                alert('Something went wrong');
                window.location.href='forgotpass.php';
                </script>";
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
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
  width:450px;
}
.header{
   margin-top:0px;
   width:400px;
}
.btn_container{
  justify-content: center; 
  display: flex;
}
</style>


      <div class="popup-container" id="forgot-popup">
    <div class="forgot popup">
    
  <form class="formm" method="post" action="">
   
  <div class="header">
  	<h2>Reset Password</h2>
  </div>
      <?php echo '<br>';?>
  	<div class="form-group mb-3">
  		<label>Email</label>
  		<input type="text" name="email" >
          <span class="text-danger" ><?php echo '<br>'; if (empty($email)) echo "This field is required"; ?></span>
  	</div>
  	<?php echo '<br>';?>
  	<div class="btn_container">
  		<button type="submit" class="btn btn-primary " name="send-reset-link">SEND LINK</button>
  	</div>
  </form>
  
      </div>
      </div>
</body>
</html>
