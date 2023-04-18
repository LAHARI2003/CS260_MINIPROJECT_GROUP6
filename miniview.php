
<?php 
session_start(); // start the session
if(isset($_SESSION['rollno'])) { // check if user is logged in
  $rollno = $_SESSION['rollno']; // get user's email from session
  // query the database to get user's information
  $conn = new mysqli('localhost', 'root', '', 'placementdb');
  $sql = "SELECT * FROM details WHERE rollno='$rollno'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rollno = $row['rollno'];
    $webmail = $row['webmail'];
    $mobile = $row['mobno'];
    $tenth = $row['tenth'];
    $twelve = $row['twelve'];
    $cpi = $row['cpi'];
    $age = $row['age'];
    $branch = $row['branch'];
    $interest = $row['interest'];
    $year = $row['year'];
    $placed = $row['placed'];
    $company= $row['company'];
    $ctc = $row['ctc'];
  }}
?>
<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" >

                <div class = "col-md-6">
                    


<?php 
$conn = mysqli_connect('localhost', 'root', '', 'placementdb'); 
		$sel = "SELECT * from upload where rollno = '$rollno'";//Select a specific row with the ID
		$que = mysqli_query($conn, $sel);

		$output = "";
		// if(mysqli_num_rows($que) < 1)
		// {
		// 	$output .= "<h3> No image uploaded</h3>";
		// }
		while ($row = mysqli_fetch_array($que)) {
			$output .= "<img src='".$row['image']."' style='width:200px;height:200px;'>";
		}
			
	?>


        


</html>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" >

<div class = "col-md-6">
    


<?php 
$conn = mysqli_connect('localhost', 'root', '', 'placementdb'); 
$sel = "SELECT * from upload where rollno = '$rollno'";//Select a specific row with the ID
$que = mysqli_query($conn, $sel);

$output = "";
// if(mysqli_num_rows($que) < 1)
// {
// 	$output .= "<h3> No image uploaded</h3>";
// }
while ($row = mysqli_fetch_array($que)) {
$output .= "<img src='".$row['image']."' style='width:200px;height:200px;'>";
}

?>
<head>
  <title>Welcome</title>

  <style>
  table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid black;
  }
  
  th, td {
    text-align: left;
    padding: 8px;
    border: 1px solid black;
  }
  
  .container {
    background-color: white;
    padding: 20px;
    width: 800px;
    border: 2px solid black;
    height:900px;
  }

  body {
    background-color: #002D72;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  
  .text-center {
    color: white;
    text-align: center;
  }
</style>

<body>
  

  <div>
  
  <div class="container">
  
    <h3>Your Information</h3>
    
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <?php echo $output;?>
    <table>
    <h3>Your Information</h3>
      <tr>
        <th>Field</th>
        <th>Value</th>
      </tr>
      <tr>
        <td>Roll No</td>
        <td><?php echo $rollno; ?></td>
      </tr>
      <tr>
        <td>Webmail</td>
        <td><?php echo $webmail; ?></td>
      </tr>
      <tr>
        <td>Mobile No.</td>
        <td><?php echo $mobile; ?></td>
      </tr>
      <tr>
        <td>10th Percentage(%)</td>
        <td><?php echo $tenth; ?></td>
      </tr>
      <tr>
        <td>12th Percentage(%)</td>
        <td><?php echo $twelve; ?></td>
      </tr>
      <tr>
        <td>CGPA(till semester 7)</td>
        <td><?php echo $cpi; ?></td>
      </tr>
      <tr>
        <td>Age</td>
        <td><?php echo $age; ?></td>
      </tr>
      <tr>
        <td>Specialization</td>
        <td><?php echo $branch; ?></td>
      </tr>
      <tr>
        <td>Area of Interest</td>
        <td><?php echo $interest; ?></td>
      </tr>
      <tr>
        <td>Batch Year</td>
        <td><?php echo $year; ?></td>
      </tr>
      <tr>
        <td>Placement Stats</td>
        <td><?php echo $placed; ?></td>
      </tr>
      <tr>
        <td>Company</td>
        <td><?php echo $company; ?></td>
      </tr>
      <tr>
        <td>CTC (if placed)</td>
        <td><?php echo $ctc; ?></td>
      </tr>
    </table>
    <form method="post" action="stuwelcome.php">
      <input type="submit" name="goback" value="Go Back">
      <p>To Update: <a href="miniupdate.php"> Update</a>.</p>
      <p>To Delete: <a href="minidelete.php"> Delete</a>.</p>
    </form>
</div>
   
  </div>
  </div>
      
</body>
    
</html>

