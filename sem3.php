<?php 
session_start();

$db = mysqli_connect('localhost', 'root', '', 'placementdb');

$s3="SELECT * FROM `semcredit` WHERE sem=3";
$q3=mysqli_query($db,$s3);
$row=mysqli_fetch_assoc($q3);
$totalcredit3=$row['c1']+$row['c2']+$row['c3']+$row['c4']+$row['c5']+$row['c6']+$row['c7'];

//echo $totalcredit1;
$total3=0;

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
if(isset($_POST['sem3_user'])){
$dismaths=mysqli_real_escape_string($db,$_POST['dismaths']);
$maths3=mysqli_real_escape_string($db,$_POST['maths3']);
$ot=mysqli_real_escape_string($db,$_POST['ot']);
$ds=mysqli_real_escape_string($db,$_POST['ds']);
$sl=mysqli_real_escape_string($db,$_POST['sl']);
$dsa=mysqli_real_escape_string($db,$_POST['dsa']);


$sqlcpi="INSERT INTO `cpitable`(`rollno`, `spi1`, `spi2`, `spi3`, `cpi`) VALUES ('$rollno',0,0,0,0)";
$resultcpi=mysqli_query($db,$sqlcpi);



//echo getgrade($ed);
$total3=getgrade($dismaths)*$row['c1']+getgrade($maths3)*$row['c2']+getgrade($ot)*$row['c3']+getgrade($ds)*$row['c4']+getgrade($sl)*$row['c5']+getgrade($dsa)*$row['c6'];
//echo $total;
$spi3=$total3/$totalcredit3;
echo $spi3;

$sqlcpi1="UPDATE `cpitable` SET `spi3`='$spi3' WHERE rollno='$rollno'";
$resultcpi1=mysqli_query($db,$sqlcpi1);

$sql="INSERT INTO `sem3`(`rollno`, `dismaths`, `maths3`, `ot`, `ds`, `sl`, `dsa`, `spi3`) VALUES ('$rollno','$dismaths','$maths3','$ot','$ds','$sl','$dsa','$spi3')";
$q=mysqli_query($db,$sql);
if($q){
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
  	<h2>Semester 3</h2>
  </div>
	 
  <form class="formm" method="post" action="sem3.php">

  

  	<!-- <div class="input-group"> -->
  		<label>Discrete Mathematics</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="dismaths" >
  	<!-- </div>
  	<div class="input-group"> -->
        <p> &emsp;</p>
  		<label>Mathematics</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="maths3">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>Optimisation Techniques</label>
          &emsp;
          &emsp;
          &emsp;
          
  		<input type="text" name="ot">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>Digital Systems</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="ds">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>Software Lab</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="sl">
  	<!-- </div>
  	<div class="btn_containe"> -->
      <p> &emsp;</p>
     
  		<label>Data Structures and Algorithm</label>
          &emsp;&emsp;&emsp;
          <input type="text" name="dsa">
          <p> &emsp;</p>
  		
  		<button type="submit" class="btn" name="sem3_user">Submit</button>
  	<!-- </div> -->
  	

    
  </form>
</body>
</html>
