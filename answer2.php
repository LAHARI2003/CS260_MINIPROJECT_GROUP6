<?php
// Connecting to database
$conn = new mysqli('localhost', 'root', '', 'placementdb');

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Executing SQL query to retrieve data sorted by CTC in descending order
$sql = "SELECT * FROM company ORDER BY ctc DESC";
$result = $conn->query($sql);

// Checking for query execution success
if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    // Displaying results in a table
    if ($result->num_rows > 0) {
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
?>