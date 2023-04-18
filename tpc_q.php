<!-- HTML form to input year -->
<!DOCTYPE html>
<html>
<body>
  <h1>Company Info</h1>
  <form action="tpc_q.php" method="post">
    <label for="year">Enter Recruitment Year:</label>
    <input type="number" id="year" name="year" min="1900" max="2099" required>
    <input type="submit" value="Submit">
  

    
  </form>
</body>
</html>
<?php
// get_companies.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve year input from form
    $year = $_POST["year"];

    // Connecting to database
    $conn = new mysqli('localhost', 'root', '', 'placementdb');


    // Checking connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Executing SQL query to retrieve companies whose rec year is less than or equal to the input year
    $sql = "SELECT * FROM company WHERE recyear <= '$year'";
    $result = $conn->query($sql);

    // Checking for query execution success
    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        // Displaying results in a table
        if ($result->num_rows > 0 ) {
            echo "<h1>Companies</h1>";
            echo "<table>";
            echo "<tr><th>Company ID</th><th>Company Name</th><th>Company Roles</th><th>Branch/Location</th><th>CPICUT</th><th>CTC</th><th>Mode of Interaction</th><th>Recruitment Year</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["jobid"] . "</td>";
                echo "<td>" . $row["comp_name"] . "</td>";
                echo "<td>" . $row["comp_roles"] . "</td>";
                echo "<td>" . $row["branch_res"] . "</td>";
                echo "<td>" . $row["cpicut"] . "</td>";
                echo "<td>" . $row["ctc"] . "</td>";
                echo "<td>" . $row["mod_inter"] . "</td>";
                echo "<td>" . $row["recyear"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
    }
    
   
    // Closing connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Company Details</title>
</head>
<body>
	<form method="post" action="tpc_q.php">
		<label for="company">Enter Company Name:</label>
		<input type="text" id="company" name="company" required>
		<br><br>
		<button type="submit" name="view">View Details</button>
	</form>
</body>
</html>
<?php
$conn = new mysqli('localhost', 'root', '', 'placementdb');


if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
// Get the company name input from the user
if(isset($_POST['view'])){
$company = $_POST['company'];

// Connect to the MySQL database




// Retrieve the company details from the database
$sql = "SELECT * FROM company WHERE comp_name = '$company'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// Output the company details
	while ($row = mysqli_fetch_assoc($result)) {
		echo "Company Name: " . $row['comp_name'] . "<br>";
		echo "Company Roles: " . $row['comp_roles'] . "<br>";
		echo "Branch Res: " . $row['branch_res'] . "<br>";
		echo "CPI Cut-off: " . $row['cpicut'] . "<br>";
		echo "CTC: " . $row['ctc'] . "<br>";
		echo "Mode of Interview: " . $row['mod_inter'] . "<br>";
		echo "Recruitment Year: " . $row['recyear'] . "<br>";
	}
} else {
	echo "Company not found.";
}

// Close the database connection
mysqli_close($conn);
}
?>