<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'placementdb');
  ?>


<!DOCTYPE html>
<html>
<body>
    
    <table>
        <tr>
            <th>Roll No</th>
            <th>Tenth</th>
            <th>CPI</th>
            <th>Age</th>
            <th>Branch</th>
            <th>Interest</th>
            <th>Year</th>
        </tr>
        <?php
        // Execute SQL query to fetch student details
        // Replace "YOUR_DB_NAME" with your actual database name
        $conn = mysqli_connect('localhost', 'root', '', 'placementdb');
  
        $query = "SELECT * FROM details WHERE placed = 'No'";
        $result = mysqli_query($conn, $query);

        // Loop through the query results and print each row in a table row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['rollno'] . "</td>";
            echo "<td>" . $row['tenth'] . "</td>";
            echo "<td>" . $row['cpi'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['branch'] . "</td>";
            echo "<td>" . $row['interest'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "</tr>";
        }

        // Close database connection 
        mysqli_close($conn);
        ?>