
<?php 
session_start(); // start the session
if(isset($_SESSION['rollno'])) { // check if user is logged in
  $rollno = $_SESSION['rollno']; // get user's email from session
  // query the database to get user's information
  $conn = new mysqli('localhost', 'root', '', 'placementdb');

  $sql = "SELECT * FROM alumni WHERE rollno='$rollno'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $name = $row['name'];
    $yearofpass=$row['yearofpass'];
    $area = $row['area'];
    $position = $row['position'];
    $organisation = $row['organisation'];
    $ctc= $row['ctc'];
    $location = $row['location'];
    $startyear = $row['startyear'];
    $endyear = $row['endYear'];
    $currworking=$row['currworking'];
  }}
?>

<!DOCTYPE html>
<html>
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
    margin: 20px auto;
    max-width: 600px;
    width: 100%;
  }
  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
  }
  th {
    background-color: #002D72;
    color: white;
  }
  .container {
    background-color: white;
    padding: 20px;
    text-align: center;
    width: 600px;
    height:750px;
    margin: 0 auto;
  }
  body {
    background-color: #002D72;
    display: flex;
    justify-content: center;
    align-items: left;
    height: 100vh;
  }
  /* .tablee{
    height:900px;
  } */
</style>

<body>
  <div class="container">
  <?php echo $output;?>  
  <table class="tablee">
      <thead>
        <tr>
          <th colspan="2">Alumni Information</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>Name:</strong></td>
          <td><?php echo $name; ?></td>
        </tr>
        <tr>
          <td><strong>Year of Passing Out:</strong></td>
          <td><?php echo $yearofpass; ?></td>
        </tr>
        <tr>
          <td><strong>Area Of Work:</strong></td>
          <td><?php echo $area; ?></td>
        </tr>
        <tr>
          <td><strong>Designation:</strong></td>
          <td><?php echo $position; ?></td>
        </tr>
        <tr>
          <td><strong>Organisation:</strong></td>
          <td><?php echo $organisation; ?></td>
        </tr>
        <tr>
          <td><strong>CTC:</strong></td>
          <td><?php echo $ctc; ?></td>
        </tr>
        <tr>
          <td><strong>Location:</strong></td>
          <td><?php echo $location; ?></td>
        </tr>
        <tr>
          <td><strong>Start Year:</strong></td>
          <td><?php echo $startyear; ?></td>
        </tr>
        <tr>
          <td><strong>End Year:</strong></td>
          <td><?php echo $endyear; ?></td>
        </tr>
        <tr>
          <td><strong>Currently Working?:</strong></td>
          <td><?php echo $currworking; ?></td>
        </tr>
      </tbody>
    </table>
    <div>
      <button class="btn btn-primary" onclick="window.location.href='main.php';">Log Out</button>
    </div>
    <p>To Update: <a href="alumniupdate.php"> Update</a>.</p>
    <p>To Delete: <a href="alumnidelete.php">  Delete</a>.</p>
  </div>
</body>
</html>

<!-- <script>
  function checkdelete(){
    return confirm("Do you want to delete the details?");
  }
  </script> -->
