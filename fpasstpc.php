<?php
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$password){
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
        $mail->Subject = 'Your Password to login to TPC Portal IIT Patna';
        $mail->Body    = "We got a request from you to get your password<br>
        Here is your password<br>
        '$password'";
        
        
    
        $mail->send();
        
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
}
$email="";
if(isset($_POST['send-pass1'])){
    $email=$_POST['email'];
    $empid=$_POST['empid'];
    $error=0;
    if(empty($email)){
        $error=1;
    }

$predefined_webmail = 'kommalapati_2101cs39@iitp.ac.in';
//   $predefined_password = 'iittpcp@123';
$sql="SELECT * FROM `tpclogin` WHERE empid='$empid'";
$q=mysqli_query($db,$sql);
if($q){
    echo "jasmine";
}
else{
    echo "sahithi";
}
$row=mysqli_fetch_assoc($q);
$password=$row['password'];
    if($error==0){
    
            if($email==$predefined_webmail && sendMail($email,$password)){
              //$_SESSION['emaill']=$email;
              echo "<script>
               alert('Password Reset Link sent to your email');
               window.location.href='tpclogin.php';
               </script>";
            }
            else{
                //echo "Server Down! try again later";
                echo "<script>
                alert('Server Down! try again later');
                window.location.href='fpasstpc.php';
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


      <div class="popup-container" id="forgot-popup">
    <div class="forgot popup">
    
  <form class="formm" method="post" action="">
   
  <div class="header">
  	<h2>Get Password</h2>
  </div>
      <?php echo '<br>';?>
  	<div class="form-group mb-3">
  		<label>Email</label>
  		<input type="text" name="email" >
          <span class="text-danger" ><?php echo '<br>'; if (empty($email)) echo "Required"; ?></span>
  	</div>

      <div class="form-group mb-3">
  		<label>Employee ID</label>
  		<input type="text" name="empid" >
          <span class="text-danger" ><?php echo '<br>'; if (empty($empid)) echo "Required"; ?></span>
  	</div>
  	<?php echo '<br>';?>
  	<div class="btn_container">
  		<button type="submit" class="btn btn-primary " name="send-pass1">SEND PASSWORD</button>
  	</div>
  </form>
  
      </div>
      </div>
</body>
</html>
