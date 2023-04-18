<!DOCTYPE html>
<html>
<head>
	<title>Placement Details</title>
	<style type="text/css">
		body {
			background-color: #191970; /* dark blue */
			color: #fff; /* white text */
			font-family: Arial, sans-serif;
			font-size: 16px;
		}

		h1, h2 {
			text-align: center;
		}

		form {
			margin: 20px;
			padding: 20px;
			border: 1px solid #fff;
			border-radius: 10px;
			background-color: #000080; /* navy blue */
		}

		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}

		input[type="text"], select {
			padding: 5px;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			width: 200px;
			margin-bottom: 10px;
		}

		input[type="submit"] {
			padding: 10px;
			background-color: #fff;
			color: #000080; /* navy blue */
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}

		table {
			margin: 20px;
			padding: 20px;
			border-collapse: collapse;
			border: 1px solid #fff;
			border-radius: 10px;
			background-color: #000080; /* navy blue */
		}

		th, td {
			padding: 10px;
			text-align: left;
			border: 1px solid #fff;
			border-radius: 5px;
		}

		th {
			background-color: #fff;
			color: #000080; /* navy blue */
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h1>Placement Details</h1>

	<form method="get">
	    <label for="attribute1">Attribute 1:</label>
	    <input type="text" name="attribute1" id="attribute1">
	   
	    <label for="sort_direction">Sort Direction:</label>
	    <select name="sort_direction" id="sort_direction">
	        <option value="ASC">Ascending</option>
	        <option value="DESC">Descending</option>
	    </select>
	    <input type="submit" name="submit" value="Sort">
	</form>

<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placementdb";
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check for connection errors
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_GET['submit'])) {
    // Get the two attribute names and sort direction from the form input
    $attribute1 = mysqli_real_escape_string($connection, $_GET['attribute1']);
    //$attribute2 = mysqli_real_escape_string($connection, $_GET['attribute2']);
    $sort_direction = mysqli_real_escape_string($connection, $_GET['sort_direction']);

    // Query your database to get the table data
    $query = "SELECT * FROM details ORDER BY $attribute1 $sort_direction";
    $result = mysqli_query($connection, $query);

    // Output the sorted table data
	
if (mysqli_num_rows($result) > 0) {
	// Output the student details in a table format
	echo "<table>";
	echo "<tr>";
	echo "<th>Roll No</th>";
	echo "<th>Tenth</th>";
	echo "<th>CPI</th>";
	echo "<th>Transcript</th>";
	echo "<th>Age</th>";
	echo "<th>Branch</th>";
	echo "<th>Year</th>";
	echo "<th>Placed</th>";
	echo "</tr>";


   
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
		echo "<td>" . $row['rollno'] . "</td>";
		echo "<td>" . $row['tenth'] . "</td>";
		echo "<td>" . $row['cpi'] . "</td>";
		echo "<td>" . $row['transcript'] . "</td>";
		echo "<td>" . $row['age'] . "</td>";
		echo "<td>" . $row['branch'] . "</td>";
		echo "<td>" . $row['year'] . "</td>";
		echo "<td>" . $row['placed'] . "</td>";
		echo "</tr>";
        // Add more columns as needed
        echo "</tr>";
    }
    echo "</table>";
}}






// Close the database connection
mysqli_close($connection);
?>