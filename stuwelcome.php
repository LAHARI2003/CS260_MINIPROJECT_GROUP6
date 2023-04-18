<?php 
session_start(); // start the session
if(isset($_SESSION['rollno'])) { // check if user is logged in
  $rollno = $_SESSION['rollno']; // get user's email from session
  // query the database to get user's information
  $conn = new mysqli('localhost', 'root', '', 'placementdb');
  $sql = "SELECT * FROM register WHERE rollno='$rollno'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
  }
}
?>
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
			$output .= "<img src='".$row['image']."' style='display: block; margin: auto; width: 200px; height: 200px;'>";
		}
			//echo $output;//Print the Output(This returns the image)
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>My PHP Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
        }
        a {
            color: #fff;
        }
        .header{
            margin-top:-130px;
        }
        a:hover {
            color: #f8f9fa;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin-top:-90px;
        }
        a, .btn {
            margin: 1rem;
        }
    </style>
</head>
<!--  -->
<body>

    <div class="container">
    <?php echo $output; ?>
        <div class="header">
        <h1>Welcome <?php echo $first_name.' '.$last_name. "!" ?></h1>
    </div>
        <p>Select any one</p>
        <div class="d-flex justify-content-center">
            <a href="details.php">Enter your details</a>
            <a href="miniview.php">View your details</a>
            <a href="miniplacement.php">Sit for placement?</a>
            <a href="studdoubts.php">Enter Your Queries here</a>
        </div>
        <form method="post" action="main.php">
    <input type="submit" name="logout" value="Logout">
    
  </form>
    </div>
    <!--  Bootstrap  -->
    


