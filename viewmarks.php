<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'placementdb');

$rollno=$_SESSION['rollno'];
echo $rollno;
$s1="SELECT * FROM `semcredit` WHERE sem=1";
$q1=mysqli_query($db,$s1);
$row1=mysqli_fetch_assoc($q1);
$totalcredit1=$row1['c1']+$row1['c2']+$row1['c3']+$row1['c4']+$row1['c5']+$row1['c6']+$row1['c7'];

//echo $totalcredit1;
$s2="SELECT * FROM `semcredit` WHERE sem=2";
$q2=mysqli_query($db,$s2);
$row2=mysqli_fetch_assoc($q2);
$totalcredit2=$row2['c1']+$row2['c2']+$row2['c3']+$row2['c4']+$row2['c5']+$row2['c6']+$row2['c7'];
//echo $totalcredit2;
$s3="SELECT * FROM `semcredit` WHERE sem=3";
$q3=mysqli_query($db,$s3);
$row3=mysqli_fetch_assoc($q3);
$totalcredit3=$row3['c1']+$row3['c2']+$row3['c3']+$row3['c4']+$row3['c5']+$row3['c6']+$row3['c7'];
//echo $totalcredit3;

$sumcredit=$totalcredit1+$totalcredit2+$totalcredit3;
//echo $sumcredit;

$cpi=0;

$sql="SELECT * FROM `cpitable` WHERE rollno = '$rollno'";
$res=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($res);

$numerator = $row['spi1']*$totalcredit1+ $row['spi2']*$totalcredit2+ $row['spi3']*$totalcredit3;
//echo $numerator;
echo $row['spi1'];
echo $row['spi2'];
$cpi=$numerator/$sumcredit;


$sqlcpi="UPDATE `cpitable` SET `cpi`='$cpi' WHERE rollno='$rollno'";
$resultcpi=mysqli_query($db,$sqlcpi);

//presenting all spi/cpi info
$fetch = "SELECT * FROM `cpitable` WHERE rollno='$rollno'";
$resultfetch=mysqli_query($db,$fetch);
$frow=mysqli_fetch_assoc($resultfetch);

$spi1=round($frow['spi1'],2);
$spi2=round($frow['spi2'],2);
$spi3=round($frow['spi3'],2);
$cpi=round($cpi,2);
?>

<!DOCTYPE html>
<html>
    <body>
    <head>
  <title>Your SPIs and CPI based on info entered</title>

  <style>
    .container {
      background-color: white;
      padding: 20px;
      text-align: center;
      width: 500px; /* Updated width */
    }

    body {
      background-color: #002D72;
      display: flex;
      justify-content:center;
      align-items: left;
      height: 100vh;
      /* margin: 0; */
    }
    .text-center{
      color:white;
      justify-content:center;
      margin-left:200px;
    }
    </style>
</head>
<body>
  <div>
  <h3 class ="text-center">Your Information</h3>
<div class="container">
  
  <p><strong>Roll No:</strong> <?php echo $rollno; ?></p>
  <p><strong>Semester 1 SPI:</strong> <?php echo $spi1; ?></p>
  <p><strong>Semester 2 SPI:</strong> <?php echo $spi2; ?></p>
  <p><strong>Semester 3 SPI:</strong> <?php echo $spi3; ?></p>
  <p><strong>CPI:</strong> <?php echo $cpi; ?></p>
 
  <form method="post" action="details.php">
    <input type="submit" name="goback" value="Go Back">
</form>
    
  </div>
  
  
  </div>
</body>
<body>
</html>