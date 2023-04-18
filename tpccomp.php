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
    $query = "SELECT * FROM company ORDER BY $attribute1 $sort_direction";
    $result = mysqli_query($connection, $query);

    // Output the sorted table data
    echo "<table>";
    echo "<tr>";
    echo "<th>Job ID</th>";
    echo "<th>Company</th>";
    echo "<th>Company Role</th>";
    echo "<th>Branch Specification</th>";
    echo "<th>Minimum Cpi</th>";
    echo "<th>CTC</th>";
    echo "<th>Recruiting Since</th>";
    echo "<th>Mode of Interview</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['jobid']  .  "</td>";
        echo "<td>" . $row['comp_name'] . "</td>";
        echo "<td>" . $row['comp_roles'] . "</td>";
        echo "<td>" . $row['branch_res'] . "</td>";
        echo "<td>" . $row['cpicut'] . "</td>";
        echo "<td>" . $row['ctc'] . "</td>";
        echo "<td>" . $row['recyear'] . "</td>";
        echo "<td>" . $row['mod_inter'] . "</td>";
        
        // Add more columns as needed
        echo "</tr>";
    }
    echo "</table>";
}

// Close the database connection
mysqli_close($connection);
?>