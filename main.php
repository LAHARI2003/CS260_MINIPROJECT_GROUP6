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
			background-color: #333;
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
		<h1>Welcome to our website</h1>
	</header>
	<nav>
		<a href="sturegister.php">Student</a>
		<a href="compreg.php">Company</a>
		<a href="admin.php">Admin</a>
		<a href="alumni.php">Alumni</a>
	</nav>
	<main>
		<p>This is the homepage of our website. Please click on one of the links above to continue.</p>
	</main>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E0F2F7;
        }
        header {
            background-color: #002D72; /* Navy blue color */
            color: #fff;
            padding: 40px;
            text-align: center;
        }
        h1 {
            font-size: 48px;
            margin: 0;
            margin-bottom: 20px;
        }
        p {
            font-size: 24px;
            color: #fff;
            margin: 0;
        }
        .photo-container {
            max-width: 800px;
            margin: 0 auto;
            height:400px;
            position: relative; /* Added position relative for nav positioning */
        }
        .photo {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 20px;
        }
        nav {
            background-color: #002D72; /* Navy blue color */
            color: #fff; /* White color */
            padding: 10px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            position: absolute; /* Position to top of the photo */
            top: 0;
            left: 0;
            right: 0;
        }
        nav a {
            display: inline-block;
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
            background-color: #002D72; /* Navy blue color */
            transition: all 0.3s ease;
        }
        nav a:hover {
            color: #fff;
            background-color: #0055A4; /* Lighter shade of navy blue */
        }
        main {
            padding: 40px;
            text-align: center;
        }
        p {
            font-size: 18px;
            color: #333;
        }
        .img1 {
  border-radius: 400px;
  height:90px;

}
    </style>
</head>
<body>
    <header>
    <img class="img1" src="logo.jpg" alt="Avatar">
        <h1 >Training and Placement Cell IIT PATNA</h1>
        
        <div class="photo-container">
            <nav> <!-- Move the nav element inside the photo-container -->
                <a href="minilogin.php">Student</a>
                <a href="complogin.php">Company</a>
                <a href="admin1.php">Admin</a>
                <a href="alumni_login.php">Alumni</a>
                <a href="tpclogin.php">TPC officer</a>
                <a href="trends.php">Trends</a>
            </nav>
            <img class="photo" src="photo.jpg" alt="Photo">
        </div>
    </header>
    <main>
        <p><b>The Training and Placement Cell of the Indian Institute of Technology (IIT) Patna is a dedicated department that facilitates the career development and placement opportunities for the students of IIT Patna. The cell acts as a bridge between the students and the industry, helping students to secure internships and job placements in leading national and international companies.</b></p>
    </main>
</body>
</html>
