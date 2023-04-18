<?php 
session_start();
require_once("database.php");

if(!ISSET($_SESSION['jobid'])){
    header('location:stuwelcome.php');
}

$jobid = $_SESSION['jobid'];
$rollno =  $_SESSION['rollno'];

$querysql="SELECT * from company where jobid='$jobid'";
$temp=mysqli_query($conn, $querysql) or die ( mysqli_error());

if($res = mysqli_fetch_assoc($temp)){
    $comp_name = $res['comp_name'];  
    $comp_roles = $res['comp_roles'];  
}

if(isset($_REQUEST['insert'])){
    $query = "INSERT INTO `stuapply`(`rollno`, `jobid`, `comp_name`, `comp_roles`) VALUES ('$rollno','$jobid','$comp_name','$comp_roles')";
    $q=mysqli_query($conn, $query);

    if($q){
        echo "<script>
    alert('Applied Successfully');
    window.location.href='miniplacement.php';
    </script>";
        $_SESSION['success'] = "You have submitted your details";
        //header('location: miniplacement.php');
    }
    else {
        echo "<script>
        alert('Not Applied!, Try Again');
        window.location.href='miniplacement.php';
        </script>";
    }
}
if(isset($_POST['ninsert'])){
    header('location: miniplacement.php');
}
?> 
     
<!DOCTYPE html>
<html>
<head>
    <script>
    function disableLink(link) {
        link.disabled = true;
    }
    </script>
</head>
<body>
    <div class="input-group">
        <a href="#" onclick="disableLink(this)">
        Are you sure you want to apply?
        </a>
    </div>
    <form method="post">
        <div class="input-group">
            <button type="submit" class="btn" name="insert">yes</button>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="ninsert">no</button>
        </div>
    </form>
</body>
</html>