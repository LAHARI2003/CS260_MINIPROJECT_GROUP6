<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		body {
			background-color: #002D72;
			color: white;
		}
	</style>
</head>
<body>
	<div class="container mt-5 text-center">
		<!-- <h1>Welcome!</h1> -->
		<p>Enter your grades for each subject here.</p>
		<ul class="list-group">
			<li class="list-group-item"><a href="sem1.php">SEMESTER1 </a></li>
			<li class="list-group-item"><a href="sem2.php">SEMESTER2</a></li>
            <li class="list-group-item"><a href="sem3.php">SEMESTER3</a></li>
		</ul>
		<div class="text-center mt-3">
			<form method="post" action="main.php">
			    <input type="submit" name="logout" value="Logout">
			</form>
		</div>
		<div class="text-center mt-3">
			<form method="post" action="viewmarks.php">
			    <input type="submit" name="view" value="View Your SPI/CPI info">
			</form>
		</div>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
?>