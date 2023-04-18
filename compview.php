<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
	<!-- Link to Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-wk9vgDn1J2WNCn8KqFc3FhJrGcPHwWxR8A6jTJ9MDYkkcLlWlHj+rsMVf03ujUgPzU44d6U8/H6U2XjY5sdC/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="style.css">
</head>

 <body>
<style>
	body {
  background-color: #002D72;
}

	
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #002D72;
    border: none;
    border-radius: 5px;
  }

  .btn_container{
  justify-content: center; 
  
  display: flex;}
</style>
	<div class="header bg-primary text-white py-3">
		<div class="container">
			<h1>Welcome!!</h1>
		</div>
	</div>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card p-3">
					<div class="card-body">
						<!-- //<p class="header">Here, you can view and update details.</p> -->
						<style>
							.button-container {
                              display: flex;
                                  justify-content: center;
                              }
							  .text-center {
								display: flex;
                                  justify-content: center;
								  color:white;
							  }
                          </style>

                     <div class="text-center">
                   <p class="text-center">Here, you can view and update details.</p>
                      </div>
					  
					  <!-- <form method="post" action="compdetails.php"> -->
						<div class="button-container">
                   <button class="btn btn-primary"  onclick="window.location.href='compdetails.php'">Give Details</button>
                      </div>
					  <!-- </form> -->
					  
					  <!-- <form method="post" action="companyview.php"> -->
					  <div class="button-container">
                   <button class="btn btn-primary"  onclick="window.location.href='companyview.php'">View Details</button>
                      </div>
					  <!-- </form> -->

					 

					  <!-- <form method="post" action="stuapplication.php"> -->
					  <div class="button-container">
                   <button class="btn btn-primary"  onclick="window.location.href='stuapplication.php'">View Student Applications</button>
                      </div>
					  <!-- </form> -->
                        <!-- <button window.location.href="compdetails.php" class="button-container">Give Details</a>
						<a href="companyview.php" class="button-container">View Details</a>
						<a href="stuapplication.php" class="button-container">View Students Application</a>
					</div> -->

					
					<!-- <form method="post" action="compdoubts.php"> -->
					  <div class="button-container">
                   <button class="btn btn-primary" onclick="window.location.href='compdoubts.php'">Enter Your Queries Here</button>
                      </div>
					  <!-- </form> -->

                    <!-- <form method="post" action="main.php"> -->
    					<!-- <input type="submit" name="logout" value="Logout" class="btn btn-danger"> -->
						<div class="button-container">
                   <button class="btn btn-primary" name="logout" value="Logout"  onclick= "window.location.href='main.php'">Logout</button>
                      </div>
    				<!-- </form> -->
					
				</div>
			</div>
		</div>
	</div>
	
	<!-- Link to Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-nm3fvuPHoEMwVjACuBZ/2V7Gys9Xj0N7NkwwyccPfz6xGx5iETLu5a5/JfI5oMFJ9XgYZiU6SzKVv6QWUxsmxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
