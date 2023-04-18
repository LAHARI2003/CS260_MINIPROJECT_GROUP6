<!DOCTYPE html>
<html>
<head>
	<title>Enter Your Queries To Fetch Details</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>
<body>
	<h2>MySQL Query</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="query">Enter the query:</label>
		<textarea id="query" name="query" rows="5" cols="40"><?php echo isset($_POST['query']) ? $_POST['query'] : ''; ?></textarea>
		<br><br>
		<input type="submit" value="Submit">
        
	</form>
    <form method="post" action="adminwelcome.php">
    <input type="submit" name="goback" value="Go Back">
    
  </form>
	<br>
    
	<?php
		// Connect to the database
		$conn = mysqli_connect('localhost', 'root', '', 'placementdb');

		// Check if the connection was successful
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// Get the user's query from the form submission
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user_query = $_POST['query'];

			// Determine the type of query (SELECT, INSERT, UPDATE, DELETE)
			$query_type = strtoupper(substr(trim($user_query), 0, 6));

			// Execute the query and display the results
			if ($query_type === 'SELECT') {
				$result = mysqli_query($conn, $user_query);
				if (mysqli_num_rows($result) > 0) {
					echo '<table>';
					// Display column headings
					echo '<tr>';
					while ($fieldinfo = mysqli_fetch_field($result)) {
						echo '<th>' . $fieldinfo->name . '</th>';
					}
					echo '</tr>';
					// Display rows
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<tr>';
						foreach ($row as $key => $value) {
							echo '<td>' . $value . '</td>';
						}
						echo '</tr>';
					}
					echo '</table>';
				} else {
					echo 'No results found.';
				}
			} elseif ($query_type === 'INSERT' || $query_type === 'UPDATE' || $query_type === 'DELETE') {
				$result = mysqli_query($conn, $user_query);
				if ($result) {
					echo mysqli_affected_rows($conn) . ' row(s) affected.';
				} else {
					echo 'Error: ' . mysqli_error($conn);
				}
			} else {
				echo 'Invalid query type.';
			}
		}

		// Close the database connection
		mysqli_close($conn);
	?>
</body>
</html>