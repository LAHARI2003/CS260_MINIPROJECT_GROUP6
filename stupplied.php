<?php
// Start a session
session_start();


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
$sql = "SELECT DISTINCT * FROM stuapply WHERE rollno='$rollno'";
    $result=mysqli_query($conn,$sql);
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
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td><b> Company ID </b></td>
                                <td><b> Company </b></td>
                                <td><b> Role</b></td>
                                
                            </tr>
                            <?php 
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $jobid = $row['jobid'];
                                        $comp_name = $row['comp_name'];
                                        $comp_roles = $row['comp_roles'];
                                        

                                       

                                    
                            ?>
                                          
                                          <tr>
                                        <td><?php echo  $jobid ?></td>
                                        <td><?php echo $comp_name?></td>
                                        <td><?php echo $comp_roles ?></td>
                                        
                                        
                                        
                                    </tr>
                                    <?php
                                    }
                                    ?> 
                                                                             

                        </table>
                    </div>
                </div>
            </div>
            <a href="miniplacement.php" class="btn btn-primary" text-align=center>Go Back</a>          
        </div>
</body>
</html>
