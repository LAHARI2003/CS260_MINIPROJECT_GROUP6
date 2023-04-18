<?php 
 //session_start(); // start the session
 if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
 }
include('alumni_server.php');
if(isset($_SESSION['rollno'])) { // check if user is logged in
  $rollno = $_SESSION['rollno']; // get user's email from session
  // query the database to get user's information
  $conn = new mysqli('localhost', 'root', '', 'placementdb');
  $sql = "SELECT * FROM register WHERE rollno='$rollno'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>My PHP Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"> -->
    <!-- Custom CSS -->
    <!-- <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
        }
        a {
            color: #fff;
        }
        a:hover {
            color: #f8f9fa;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        a, .btn {
            margin: 1rem;
        }
    </style> -->
</head>
<body>
<?php echo '<br>';?>
    <div class="container">
    <?php echo '<br>';?>
    <div class="text-center">
        <h1>Welcome <?php echo $first_name.' '.$last_name. "" ?> to TPC Portal</h1>
      </div>

      <?php echo '<br>';?>

        <div class="d-flex justify-content-center">
           
           <!-- //ADDING STYLE -->
            <style>

              .text-center{
                color:white;
              }
              .formm{
                justify-content: center;
                width:1300px;
                height: 300px;
                
              }
              body {
      background-color: #002D72;
      display: flex;
      justify-content: center; */
      /* align-items: center;
      height: 100vh;
      /* margin: 0; */
    }
							.btn_container {
                              display: flex;
                                  justify-content: center;
                              }
							  .text-center {
								display: flex;
                    justify-content: center;
							  }
  
                html, body {
  height: 100%;
}
                
                .form-inline {
                  width=100%;
                  height=100%;
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

/* Add some margins for each label */
.form-inline label {
  margin: 5px 10px 5px 0;
}

/* Style the input fields */
.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

/* Style the submit button */
.form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
}

.form-inline button:hover {
  background-color: royalblue;
}

/* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
@media (max-width: 1400px) {
  .form-inline input {
    margin: 10px 0;
  }

  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}

                          </style>

<!-- ENDING STYLE -->

            <div class="btn_container">
        <button class="btn btn-primary" onclick="window.location.href='alumni_view.php';">
        View Your Details 
    </button>
    &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;
    &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;
    &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;
    <button class="btn btn-primary" onclick="window.location.href='main.php';">Log Out</button>
    </div>

<div class="text-center">
    <a >Enter your details here</a>
              </div>
              
            <form class="formm" method="post" action="alumni_info.php">
 <?php $errors = array(); // Initialize $errors as an empty array ?>
    <?php if (count($errors) > 0) : ?>
      <div class="error">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
      </div>
    <?php endif ?>
    <!-- <div class="input-group"> -->
      <label>Name</label>
      <input type="text" name="name" value="" >
      <span class="text-danger" ><?php if (empty($name)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp; </span>
     
    <!-- </div>
    <div class="input-group"> -->

    <label>Year of Passing Out</label>
      <input type="text" name="yearofpass" value="" >
      <span class="text-danger" ><?php if (empty($yearofpass)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp; </span>

      <label>Area of Work</label>
      <select name="areaWork">
        <option value="">--Select--</option>
        <option value="Higher Studies">Higher Studies</option>
        <option value="Web Development">Web Development</option>
        <option value="Management">Management</option>
        <option value="Production">Production</option>
        <option value="Mobile Development">Mobile Development</option>
        <option value="Data Science">Data Science</option>
        <option value="Machine Learning">Machine Learning</option>
        <option value="Civil Services">Civil Service</option>
        <option value="Business">Business</option>
        <option value="Agriculture">Agriculture</option>
        <option value="Marketing">Marketing</option>
        <option value="Finance">Finance</option>
        <option value="Aerospace">Aerospace</option>
        <option value="Other">Other</option>
      </select>
      <span class="text-danger" ><?php if (empty($area)) echo "Required"; ?> &emsp; &emsp; &emsp;  </span>
      <p> &emsp; </p>
    <!-- </div>
    <div class="input-group"> -->
    
      <label>Designation</label>
      <input type="text" name="position" value="" >
       &emsp; &emsp; &emsp; &emsp; &emsp; 
    <!-- </div>
    <div class="input-group"> -->
      <label>Organisation/University Name </label>
      <input type="text" name="organisation" value="" >
      <span class="text-danger" ><?php if (empty($organisation)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp; </span>
    <!-- </div>
    <div class="input-group"> -->
      <label>CTC </label>
      <input type="text" name="ctc" value="">
      <p> &emsp; </p>
      <p> &emsp; </p>
    <!-- </div>
    <div class="input-group"> -->
      <label>Location (Enter name of the city)</label>
      <input type="text" name="location" value="">
      <span class="text-danger" ><?php if (empty($location)) echo "Required"; ?>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</span>
    <!-- </div>
    <div class="input-group"> -->
      <label>Start Year</label>
      <input type="text" name="startyear" >
      <span class="text-danger" ><?php if (empty($startyear)) echo "Required"; ?>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;</span>
    <!-- </div>
    <div class="input-group"> -->
    <p> &emsp; </p>
    <p> &emsp; </p>
      <label>End Year</label>
      <input type="text" name="endYear">
    <!-- </div>
    <div class="input-group"> -->
    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
      <label>Are you currently working here?</label>
      <select name="currworking">
        <option value="">--Select--</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
        
      </select>
      <span class="text-danger" ><?php if (empty($currworking)) echo "Required"; ?></span>
    <!-- </div> -->
    <p> &emsp; </p>
    <p> &emsp; </p>
    <div class="btn_container">
      <button type="submit" class="btn" name="alumni_apply">Submit</button>
    </div>
    </form>
   
    
  
        </div>
        
        <!-- <div class="btn_container">
            
        </div> -->
        
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
} else { // if user is not logged in, redirect to login page
  header("Location: alumni_login.php");
  exit();
}
?>
