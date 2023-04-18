<?php 
session_start();

$db = mysqli_connect('localhost', 'root', '', 'placementdb');

$s2="SELECT * FROM `semcredit` WHERE sem=2";
$q2=mysqli_query($db,$s2);
$row=mysqli_fetch_assoc($q2);
$totalcredit2=$row['c1']+$row['c2']+$row['c3']+$row['c4']+$row['c5']+$row['c6']+$row['c7'];

// echo $totalcredit1;
$total2=0;

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
if(isset($_POST['sem2_user'])){
$cprogram=mysqli_real_escape_string($db,$_POST['cprogram']);
$evs=mysqli_real_escape_string($db,$_POST['evs']);
$bio=mysqli_real_escape_string($db,$_POST['bio']);
$chem=mysqli_real_escape_string($db,$_POST['chem']);
$maths2=mysqli_real_escape_string($db,$_POST['maths2']);


$sqlcpi="INSERT INTO `cpitable`(`rollno`, `spi1`, `spi2`, `spi3`, `cpi`) VALUES ('$rollno',0,0,0,0)";
$resultcpi=mysqli_query($db,$sqlcpi);

//echo getgrade($ed);
$total2=getgrade($cprogram)*$row['c1']+getgrade($evs)*$row['c2']+getgrade($bio)*$row['c3']+getgrade($chem)*$row['c4']+getgrade($maths2)*$row['c5'];
//echo $total;
$spi2=$total2/$totalcredit2;

$sqlcpi1="UPDATE `cpitable` SET `spi2`='$spi2' WHERE rollno='$rollno'";
$resultcpi1=mysqli_query($db,$sqlcpi1);

$sql="INSERT INTO `sem2`(`rollno`, `cprogram`, `evs`, `bio`, `chem`, `maths2`, `spi2`) VALUES ('$rollno','$cprogram','$evs','$bio','$chem','$maths2','$spi2')";
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
  	<h2>Semester 2</h2>
  </div>
	 
  <form class="formm" method="post" action="sem2.php">

  

  	<!-- <div class="input-group"> -->
  		<label>C Programming</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="cprogram" >
  	<!-- </div>
  	<div class="input-group"> -->
        <p> &emsp;</p>
  		<label>Environmental Studies</label>
          &emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="evs">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>Biology For Engineers </label>
          &emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="bio">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>Chemistry</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="chem">
  	<!-- </div>
      <div class="input-group"> -->
      <p> &emsp;</p>
  		<label>Mathematics</label>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  		<input type="text" name="maths2">
  	<!-- </div>
  	<div class="btn_containe"> -->
      <p> &emsp;</p>
  		<button type="submit" class="btn" name="sem2_user">Submit</button>
  	<!-- </div> -->
  	

    
  </form>
</body>
</html>
