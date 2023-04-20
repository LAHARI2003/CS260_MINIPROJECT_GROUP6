<?php
// Start a session
session_start();

if (!isset($_SESSION['cpi'])) {
  if(!isset($_SESSION['rollno'])){
    
    echo "hello";
    // If not, redirect to a page where the student can enter their CPI
   
    exit();
  }
  
}
$rollno = $_SESSION['rollno'];



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
$sql2 = "SELECT * FROM details WHERE rollno='$rollno'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
      $row2 = $result2->fetch_assoc();
    //   $cpi = $row2['cpi'];
      //$_SESSION['cpi'] = $cpi;
      $ctc = $row2['ctc'];
      //$_SESSION['ctc'] = $ctc;
    }

    $sql3 = "SELECT * FROM cpitable WHERE rollno='$rollno'";
    $result3 = $conn->query($sql2);
    if ($result3->num_rows > 0) {
      $row3 = $result3->fetch_assoc();
       $cpi = $row2['cpi'];
      
    }
// Query the jobs table for jobs with a CPI less than or equal to the student's CPI
$sql = "SELECT * FROM company WHERE cpicut <= $cpi AND ctc >= $ctc";
$result = mysqli_query($conn, $sql);

 
// Close the database connection

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
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <a href="stuapplied.php">Your Applied Companies</a> 
                    <div class="card mt-5">
                      
                    
                        <table class="table table-bordered">

                        <h1> The companies you are eligible for </h1>
                            <tr>
                                <td><b> Company ID </b></td>
                                <td><b> Company </b></td>
                                <td><b> Role</b></td>
                                <td><b> Branch </b> </td>
                                <td><b> Min Required CPI </b></td>
                                <td><b> CTC </b> </td>
                            </tr>
                            <?php 
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $jobid = $row['jobid'];
                                        $comp_name = $row['comp_name'];
                                        $comp_roles = $row['comp_roles'];
                                        $branch_res = $row['branch_res'];
                                        $cpicut = $row['cpicut'];
                                        $ctc = $row['ctc'];

                                       

                                    
                            ?>
                                          
                                          <tr>
                                        <td><?php echo  $jobid ?></td>
                                        <td><?php echo $comp_name?></td>
                                        <td><?php echo $comp_roles ?></td>
                                        <td><?php echo $branch_res?></td>
                                        <td><?php echo $cpicut ?></td>
                                        <td><?php echo $ctc ?></td>
                                        <td><a href=<?php  echo  "stuapply.php?jobid=".$jobid?>>Apply</a></td>
                                        
                                    </tr>
                                    <?php
                                    }
                                    ?> 
                                                                             

                        </table>
                    </div>
                </div>
            </div>
            <a href="stuwelcome.php" class="btn btn-primary" text-align=center>Go Back</a>  
            &emsp;&emsp;&emsp;   
              
        </div>
</body>
</html>
