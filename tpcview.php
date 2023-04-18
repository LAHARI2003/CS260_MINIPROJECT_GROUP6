<!-- <!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		header {
			background-color: #002D72;
			color: #fff;
			padding: 20px;
			text-align: center;
		}
		nav {
			background-color: #ddd;
			padding: 10px;
			text-align: center;
		}
		nav a {
			display: inline-block;
			margin: 0 10px;
			text-decoration: none;
			color: #333;
			font-weight: bold;
		}
		nav a:hover {
			color: #fff;
			background-color: #333;
		}
	</style>
</head>
<body>
	<header>
		<h1>TPC SECTION IIT PATNA</h1>
	</header>
	<nav>
		<a href="tpc_notplaced.php">Not Placed Student Details</a>
		<a href="tpcstu.php">Student details</a>
		<a href="tpccomp.php">Company Details</a>
		<a href ="tpc_q.php">Sorting details</a>
		<a href="main.php">Logout</a>
		
		
	</nav>
	<main>
		<p>This is Home page for tpc section IIT PATNA.</p>
	</main>
</body>
</html>
    
     -->
       
    
    <!-- <h1>Student Details</h1>
    <h2>Placed Students</h2> -->
    <!-- 
    // Execute SQL query to fetch count of placed students
    // Replace "YOUR_DB_NAME" with your actual database name
    // $conn = mysqli_connect('localhost', 'root', '', 'placementdb');
    // $query_placed = "SELECT COUNT(*) as count FROM details WHERE placed = 'Yes'";
    // $result_placed = mysqli_query($conn, $query_placed);
    // $row_placed = mysqli_fetch_assoc($result_placed);
    // echo "<p>Total Placed Students: " . $row_placed['count'] . "</p>";


	// $q1="SELECT * FROM details WHERE placed = 'Yes'";
	// $r1 = mysqli_query($conn, $query_placed);
    // // Execute SQL query to fetch count of not placed students
    // $query_not_placed = "SELECT COUNT(*) as count FROM details WHERE placed = 'No'";
    // $result_not_placed = mysqli_query($conn, $query_not_placed);
    // $row_not_placed = mysqli_fetch_assoc($result_not_placed);
    // echo "<h2>Not Placed Students</h2>";
    // echo "<p>Total Not Placed Students: " . $row_not_placed['count'] . "</p>";
 
    // Close database connection
    // mysqli_close($conn);
    // ?> -->

    <!-- </table> -->
<!-- </body>
</html> -->





<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		header {
			background-color: #002D72;
			color: #fff;
			padding: 20px;
			text-align: center;
		}
		nav {
			background-color: #ddd;
			padding: 10px;
			text-align: center;
		}
		nav a {
			display: inline-block;
			margin: 0 10px;
			text-decoration: none;
			color: #333;
			font-weight: bold;
		}
		nav a:hover {
			color: #fff;
			background-color: #333;
		}
        .container {
            background-color: white;
            padding: 20px;
            text-align: center;
            width: 500px;
            margin: auto;
        }
        h1, h2, p {
            margin: 10px;
        }
	</style>
</head>
<body>
	<header>
		<h1>TPC SECTION IIT PATNA</h1>
	</header>
	<nav>
		<a href="tpc_notplaced.php">Not Placed Student Details</a>
		<a href="tpcstu.php">Student details</a>
		
		<a href ="tpc_q.php">Sorting details</a>
		<a href="tpc_company_query.php">Company Queries</a>
		<a href ="tpcquerydisplay.php">Student Queries</a>
		<a href="main.php">Logout</a>
	</nav>
	<main>
        <div class="container">
            <h1>Student Details</h1>
            <h2>Placed Students</h2>
            <?php
            // Execute SQL query to fetch count of placed students
            // Replace "YOUR_DB_NAME" with your actual database name
            $conn = mysqli_connect('localhost', 'root', '', 'placementdb');
            $query_placed = "SELECT COUNT(*) as count FROM details WHERE placed = 'Yes'";
            $result_placed = mysqli_query($conn, $query_placed);
            $row_placed = mysqli_fetch_assoc($result_placed);
            echo "<p>Total Placed Students: " . $row_placed['count'] . "</p>";
			$q1="SELECT * FROM details WHERE placed = 'Yes'";
        $r1 = mysqli_query($conn, $query_placed);
        // Execute SQL query to fetch count of not placed students
        $query_not_placed = "SELECT COUNT(*) as count FROM details WHERE placed = 'No'";
        $result_not_placed = mysqli_query($conn, $query_not_placed);
        $row_not_placed = mysqli_fetch_assoc($result_not_placed);
        echo "<h2>Not Placed Students</h2>";
        echo "<p>Total Not Placed Students: " . $row_not_placed['count'] . "</p>";

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>
</main>

