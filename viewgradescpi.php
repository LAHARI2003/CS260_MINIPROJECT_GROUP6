<?php
session_start();
if(isset($_SESSION['rollno'])) { // check if user is logged in
    $rollno = $_SESSION['rollno'];
    $db = new mysqli('localhost', 'root', '', 'placementdb');
    
    $s1="SELECT * FROM `sem1` WHERE rollno='$rollno'";
    $r1=mysqli_query($db,$s1);
    $row1=mysqli_fetch_assoc($r1);
    $cmskill=$row1['comskills'];
    $maths=$row1['maths'];
    $mech=$row1['mech'];
    $phy=$row1['phy'];
    $ed=$row1['ed'];

    $s2="SELECT * FROM `sem2` WHERE rollno='$rollno'";
    $r2=mysqli_query($db,$s2);
    $row2=mysqli_fetch_assoc($r2);
    $cprogram=$row2['cprogram'];
    $evs=$row2['evs'];
    $bio=$row2['bio'];
    $chem=$row2['chem'];
    $maths2=$row2['maths2'];

    $s3="SELECT * FROM `sem3` WHERE rollno='$rollno'";
    $r3=mysqli_query($db,$s3);
    $row3=mysqli_fetch_assoc($r3);
    $dismaths=$row3['dismaths'];
    $maths3=$row3['maths3'];
    $ot=$row3['ot'];
    $ds=$row3['ds'];
    $sl=$row3['sl'];
    $dsa=$row3['dsa'];

    $fetch = "SELECT * FROM `cpitable` WHERE rollno='$rollno'";
$resultfetch=mysqli_query($db,$fetch);
$frow=mysqli_fetch_assoc($resultfetch);

$spi1=round($frow['spi1'],2);
$spi2=round($frow['spi2'],2);
$spi3=round($frow['spi3'],2);
$cpi=round($frow['cpi'],2);

 }
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
  <h3 class ="text-center">GRADES AND SPIs</h3>

<p style="color:white";><strong>Roll No:</strong> <?php echo $rollno; ?></p>

<div class="container">
  <p><strong>Semester 1 SPI:</strong> <?php echo $spi1; ?></p>
  <p><strong>Semester 2 SPI:</strong> <?php echo $spi2; ?></p>
  <p><strong>Semester 3 SPI:</strong> <?php echo $spi3; ?></p>
  <p><strong>CPI:</strong> <?php echo $cpi; ?></p>
</div>

<div class="container">
<h3 >SEMESTER I GRADES</h3>
  <p><strong>Communication Skills:</strong> <?php echo $cmskill; ?></p>
  <p><strong>Mathematics I:</strong> <?php echo $maths; ?></p>
  <p><strong>Mechanical Engineering:</strong> <?php echo $mech; ?></p>
  <p><strong>Physics:</strong> <?php echo $phy; ?></p>
  <p><strong>Engineering Drawing:</strong> <?php echo $ed; ?></p>
</div>

<div class="container">
<h3 >SEMESTER II GRADES</h3>
  <p><strong>C Programming:</strong> <?php echo $cprogram; ?></p>
  <p><strong>Environmental Studies:</strong> <?php echo $evs; ?></p>
  <p><strong>Biology for Engineers:</strong> <?php echo $bio; ?></p>
  <p><strong>Chemistry:</strong> <?php echo $chem; ?></p>
  <p><strong>Mathematics II:</strong> <?php echo $maths2; ?></p>
</div>

<div class="container">
<h3 >SEMESTER III GRADES</h3>
  <p><strong>Discrete Mathematics:</strong> <?php echo $dismaths; ?></p>
  <p><strong>Mathematics III:</strong> <?php echo $maths3; ?></p>
  <p><strong>Optimisation Techniques:</strong> <?php echo $ot; ?></p>
  <p><strong>Digital Systems:</strong> <?php echo $ds; ?></p>
  <p><strong>Software Lab:</strong> <?php echo $sl; ?></p>
  <p><strong>Data Structures and Algorithm:</strong> <?php echo $dsa; ?></p>

</div>

 
  <form method="post" action="stuapplication.php">
    <input type="submit" name="goback" value="Go Back">
</form>
    
  </div>
  
  
  </div>
</body>
<body>
</html>