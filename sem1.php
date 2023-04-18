<?php 
session_start();

$db = mysqli_connect('localhost', 'root', '', 'placementdb');
$s1="SELECT * FROM `semcredit` WHERE sem=1";
$q1=mysqli_query($db,$s1);
$row=mysqli_fetch_assoc($q1);
$totalcredit1=$row['c1']+$row['c2']+$row['c3']+$row['c4']+$row['c5']+$row['c6']+$row['c7'];

// echo $totalcredit1;
$total=0;

function getgrade($grade){
   switch($grade){
    case "AA":
        return 10;
        break;
   
   case "AB":
    return 9;
    break;

   case "BB":
    return 8;
    break;

    case "BC":
        return 7;
        break;

        case "CC":
            return 6;
            break;

        case "CD":
         return 5;
         break;

         case "DD":
            return 4;
            break;

            case "F":
                return 3;
                break;

}
}
$rollno=$_SESSION['rollno'];
// echo $rollno;

if(isset($_POST['sem1_user'])){
$cmskill=mysqli_real_escape_string($db,$_POST['cmskill']);
$math=mysqli_real_escape_string($db,$_POST['math']);
$mech=mysqli_real_escape_string($db,$_POST['mech']);
$physics=mysqli_real_escape_string($db,$_POST['physics']);
$ed=mysqli_real_escape_string($db,$_POST['ed']);
//inserting in cpitabel

$sqlcpi="INSERT INTO `cpitable`(`rollno`, `spi1`, `spi2`, `spi3`, `cpi`) VALUES ('$rollno',0,0,0,0)";
$resultcpi=mysqli_query($db,$sqlcpi);
//echo getgrade($ed);
$total=getgrade($cmskill)*$row['c1']+getgrade($math)*$row['c2']+getgrade($mech)*$row['c3']+getgrade($physics)*$row['c4']+getgrade($ed)*$row['c5'];
//echo $total;
$spi1=$total/$totalcredit1;

$sqlcpi1="UPDATE `cpitable` SET `spi1`='$spi1' WHERE rollno='$rollno'";
$resultcpi1=mysqli_query($db,$sqlcpi1);

$sql="INSERT INTO `sem1`(`rollno`, `comskills`, `maths`, `mech`, `phy`, `ed`, `spi`) VALUES ('$rollno','$cmskill','$math','$mech','$physics','$ed', '$spi1')";
$res=mysqli_query($db,$sql);

if($res){

   
    header("location:CSE.php");
}
else{
    echo "<script>
      alert('Info already present!');
      window.location.href='CSE.php';
      </script>";
}

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css"href="style.css" >
</head>
<body>

<style>
    body {
background-color: #002D72;

justify-content: center; 
/* align-items: center;
height: 100vh;
/* marg
in: 0; */
}
.formm{
  justify-content: center;
  
  width:800px;
  height: 300px;
  margin-top:60px;
  /* margin-left:-10px; */
}
.text-center {
  display: flex;
      justify-content: center;
      color:white;
  }
  .btn{
    color:#002D72;
    justify-content: center;
  }
</style>

<div class="text-center">
  	<h2>Semester 1</h2>
  </div>
	 
  <form class="formm" method="post" action="sem1.php">

  

  	<!-- <div class="input-group"> -->
  		<label>Communication Skills</label>
          &emsp;&emsp;
  		<input type="text" name="cmskill" >
  	<!-- </div>
  	<div class="input-group"> -->
        <p> &emsp;</p>
  		<label>Mathematics</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="math">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>Mechanical engineering</label>
          &emsp;
  		<input type="text" name="mech">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>Physics</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="physics">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>ED</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="ed">
  	<!-- </div>
  	<div class="btn_containe"> -->
      <p> &emsp;</p>
  		<button type="submit" class="btn" name="sem1_user">Submit</button>
  	<!-- </div> -->
  	

    
  </form>
</body>
</html>
