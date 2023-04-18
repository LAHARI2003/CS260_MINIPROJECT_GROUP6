<?php
$db = mysqli_connect('localhost', 'root', '', 'placementdb');
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
        echo "00";
        
            $reset_token=bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date=date("Y-m-d");
            $query= "UPDATE register SET resetToken='$reset_token',tokenExpired='$date' where email='$_POST[email]'";
            //echo sendMail($_POST['email'],$reset_token);
            if(mysqli_query($db,$query) && sendMail($_POST['email'],$reset_token)){
               echo "Password Reset Link sent to your email";
            }
            else{
                echo "Server Down! try again later";
            }

     }
     else echo "Email not Found";
    }
    else{
        echo "Something went wrong";
    }
}
}
?>
 ?>