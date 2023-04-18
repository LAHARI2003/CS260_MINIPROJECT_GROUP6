<?php
// Start a session
session_start();


//   if(!isset($_SESSION['jobid'])){
    
//     echo "hello";
//     // If not, redirect to a page where the student can enter their CPI
   
//     exit();
//   }
  

$jobid = $_SESSION['jobid'];
// $rollno = "";



// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'placementdb';
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Get the student's CPI from the session
//$cpi = $_SESSION['cpi'];
//$ctc = $_SESSION['ctc'];
// $sql2 = "SELECT * FROM stuapply WHERE jobid ='$jobid'";
//     $result2 = $conn->query($sql2);
//     if ($result2->num_rows > 0) {
//       $row2 = $result2->fetch_assoc();
//       $cpi = $row2['cpi'];
//       //$_SESSION['cpi'] = $cpi;
//       $ctc = $row2['ctc'];
//       //$_SESSION['ctc'] = $ctc;
//     }

// Query the jobs table for jobs with a CPI less than or equal to the student's CPI
$sql = "SELECT * FROM stuapply WHERE jobid = '$jobid'";
$result = mysqli_query($conn, $sql);
$rollno = $_SESSION['rollno'];
// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>View Details</title>
</head>
<body class="bg-dark">

        <div class="container">
       
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td><b> Roll No  </b></td>
                                <td><b> Applied Company Role </b></td>
                                <td><b> Company</b></td>
                                <td><b> Student Info</b></td>
                                <td><b> Student Grades and CPI Info</b></td>
                            </tr>
                            <?php 
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $rollno = $row['rollno'];
                                        $comp_name = $row['comp_name'];
                                        $comp_roles = $row['comp_roles'];
                                       
                            ?>
                                    <tr>
                                        <td><?php echo $rollno ?></td>
                                        <td><?php echo $comp_name ?></td>
                                        <td><?php echo $comp_roles ?></td>
                                       
                                        <td><a href="stuinfo.php">Click Here</a></td>
                                        <td><a href="viewgradescpi.php">Click Here</a></td>
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                      

                        </table>
                    </div>
                </div>
            </div>
            <a href="compview.php" class="btn btn-primary" text-align=center>Go Back</a>          
        </div>
</body>
</html>