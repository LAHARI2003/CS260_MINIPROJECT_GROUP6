
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
