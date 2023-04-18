<?php
session_start();
$errors = array();
// Check if the user is logged in
if (!isset($_SESSION['rollno'])) {
  header('Location: minilogin.php');
  exit;
}

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

// Check if the connection was successful
if (!$db) {
  die('Connection failed: ' . mysqli_connect_error());
}

$q="SELECT * from details where rollno='$_SESSION[rollno]'";
$res=mysqli_query($db,$q);
if($row=mysqli_fetch_assoc($res)){
     $oldwebmail=$row['webmail'];
     $oldmobile=$row['mobno'];
     $oldtenth=$row['tenth'];
     $oldtwelve=$row['twelve'];
     $oldcpi=$row['cpi'];
     $oldtranscript=$row['transcript'];
     $oldage=$row['age'];
     $oldbranch=$row['branch'];
     $oldinterest=$row['interest'];
     $oldyear=$row['year'];
     $oldplaced=$row['placed'];
     $oldcompany=$row['company'];
     $oldctc=$row['ctc'];
}
// Handle form sucbmission
if (isset($_POST['update_user'])) {
  // receive all input values from the form
  $webmail= mysqli_real_escape_string($db, $_POST['webmail']);
  $mobile=mysqli_real_escape_string($db, $_POST['mobile']);
  $tenth = mysqli_real_escape_string($db, $_POST['tenth']);
  $twelve= mysqli_real_escape_string($db, $_POST['twelve']);
  $cpi = mysqli_real_escape_string($db, $_POST['cpi']);
  $transcript = mysqli_real_escape_string($db, $_POST['transcript']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $branch = mysqli_real_escape_string($db, $_POST['branch']);
  $interest = mysqli_real_escape_string($db, $_POST['interest']);
  $year = mysqli_real_escape_string($db, $_POST['year']);
  $placed = mysqli_real_escape_string($db, $_POST['placed']);
  $company =  mysqli_real_escape_string($db, $_POST['company']);
  $ctc = mysqli_real_escape_string($db, $_POST['ctc']);
 
  /*if(strlen($password)<6){
    echo "password length should be atleast 6";
  }
  // Encrypt the password using bcrypt
  $hash = md5($password);
*/
  // Update the user's information in the "users" table
  $sql = "UPDATE details SET webmail='$webmail',mobno='$mobile',tenth = '$tenth',twelve='$twelve', cpi = '$cpi', transcript = '$transcript', branch = '$branch', interest = '$interest', year = '$year', placed = '$placed',  company='$company',ctc = '$ctc' WHERE rollno = '".$_SESSION['rollno']."'";
  $result = mysqli_query($db, $sql);

  if($result){
   
    echo "<script>
    alert('Updated Successfully');
    window.location.href='miniview.php';
    </script>";
    $_SESSION['success'] = "You have submitted your details";
   }
    else{
      echo "<script>
    alert('Not Updated');
    window.location.href='miniupdate.php';
    </script>";
    }
  // Redirect to the profile page
  //header('Location: miniview.php');
  //exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- //ADDING STYLE -->
<style>

  .btn{
    justify-content: center;
  }

.text-center{
  color:white;
  justify-content: center;
}

.formm{
  justify-content: center;
  
  width:1300px;
  height: 450px;
  margin-top:90px;
  margin-left:-100px;
}
body {
background-color: #002D72;
display: flex;
justify-content: center; 
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

<div class="text-center">
    <a >                                                                                    Enter your details here</a>
              </div>
    
  <form class ="formm" method="post" action="miniupdate.php" enctype = "multipart/form-data">
    <?php $errors = array(); // Initialize $errors as an empty array ?>
    <?php if (count($errors) > 0) : ?>
      <div class="error">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
      </div>
    <?php endif ?>
    <p> &emsp; </p>
    
    <label>Webmail</label>
      <input type="text" name="webmail" value="<?php echo $oldwebmail; ?>">
      <span class="text-danger" ><?php if (empty($webmail)) echo "Required"; ?> &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>

    <!-- <div class="input-group"> -->
    <label>Mobile No.</label>
      <input type="text" name="mobile" value="<?php echo $oldmobile; ?>">
      <span class="text-danger" ><?php if (empty($mobile)) echo "Required"; ?> &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>

      
      <p> &emsp; </p>
      <label>10th Marks (in percentage)</label>
      <input type="text" name="tenth" value="<?php echo $oldtenth; ?>">
      <span class="text-danger" ><?php if (empty($tenth)) echo "Required"; ?>  &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>

    <!-- </div>
    <div class="input-group"> -->
    <label>12th Marks (in percentage)</label>
      <input type="text" name="twelve" value="<?php echo $oldtwelve; ?>">
      <span class="text-danger" ><?php if (empty($twelve)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>
       
      <p> &emsp; </p>
      <label>CGPA/CPI</label>
      <input type="number" step="0.01" name="cpi" value="<?php echo $oldcpi; ?>">
      <span class="text-danger" ><?php if (empty($cpi)) echo "Required"; ?> &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;</span>
<!-- <p> &emsp; </p> -->
    <!-- </div>
    <div class="input-group"> -->
      <label>Upload transcript link here: </label>
      <input type="text" name="transcript"  ?>
      <span class="text-danger" ><?php if (empty($transcript)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>
        <!-- </div>
    <div class="input-group"> -->
    <p> &emsp; </p>
      <label>Age(in years)</label>
      <input type="text" name="age" value="<?php echo $oldage; ?>">
      <span class="text-danger" ><?php if (empty($age)) echo "Required"; ?>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp; </span>
    <!-- </div>
    <div class="input-group"> -->
    
      <label>Specialization</label>
      <input type="text" name="branch" value="<?php echo $oldbranch; ?>">
      <span class="text-danger" ><?php if (empty($branch)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp; </span>
    <!-- </div>
    <div class="input-group"> -->
    <p> &emsp; </p>
      <label>Area of Interest</label>
      <select name="interest">
        <option value="">--Select--</option>
        <option value="Web Development">Web Development</option>
        <option value="Management">Management</option>
        <option value="Production">Production</option>
        <option value="Core">Core</option>
        <option value="Mobile Development">Mobile Development</option>
        <option value="Data Science">Data Science</option>
        <option value="Machine Learning">Machine Learning</option>
      </select>
      <span class="text-danger" ><?php if (empty($interest)) echo "Required"; ?>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp; </span>
    <!-- </div>
    <div class="input-group"> -->
    
      <label>Batch Year</label>
      <input type="number" name="year" value="<?php echo $oldyear; ?>">
      <span class="text-danger" ><?php if (empty($year)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>
    <!-- </div>
    <div class="input-group"> -->
    <p> &emsp; </p>
      <label>Placed or Not?</label>
      <select name="placed">
        <option value="">--Select--</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
      <span class="text-danger" ><?php if (empty($placed)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp; </span>
    <!-- </div>
    <div class="input-group"> -->
    <p> &emsp; </p>

    <label>Company(If Placed)</label>
      <input type="text" name="company" class="form-control"value="<?php echo $oldcompany;?>">
      &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp; 
      <label>CTC(if placed)</label>

     
      <input type="number" name="ctc" value="<?php echo $oldctc; ?>">
      <span class="text-danger" ><?php if (empty($ctc)) echo "Required"; ?> </span>
    <!-- </div>
    <div class="input-group"> -->

    
       &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;

       <p> &emsp; </p>
      
    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 
      <button type="submit" class="btn" name="update_user">Update</button>
    </div>
</form>


</body>
</html>
