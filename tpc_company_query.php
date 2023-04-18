<?php
$conn = mysqli_connect('localhost','root','','placementdb');

$sql = "SELECT * FROM compquerydb";
$result = mysqli_query($conn,$sql);
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title>Recycle View</title>
</head>
<body>
    <h1>Query Display of Companies</h1>
    <table>
        <tr>
            <th>Job ID</th>
            <th>Company name</th>
            <th>Query</th>
        </tr>
        <?php
        // Loop through the result and display data in the table
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["jobid"] . "</td>";
                echo "<td>" . $row["comp_name"] . "</td>";
                echo "<td>" . $row["query"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No data available</td></tr>";
        }
        ?>
    </table>
</body>
</html> 