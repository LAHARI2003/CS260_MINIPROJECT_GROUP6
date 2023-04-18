<?php

session_start();

if(!ISSET($_SESSION['rollno'])){
    header('location:alumni_login.php');
}
$db= new mysqli('localhost', 'root', '', 'placementdb');



$query = "DELETE FROM alumni WHERE rollno='$_SESSION[rollno]'"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());



if($result){
    echo "<script>
    alert('Info Deleted Successfully');
    window.location.href='alumni_login.php';
    </script>";
    //header("Location: alumni_info.php"); 
    
}
else {
    echo "<script>
    alert('Your profile is not deleted!');
    window.location.href='alumni_info.php';
    </script>";
}

?>