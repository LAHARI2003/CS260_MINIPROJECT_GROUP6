<?php 
session_start();

if(!ISSET($_SESSION['rollno'])){
    header('location:alumni_login.php');
}
$db= new mysqli('localhost', 'root', '', 'placementdb');
$querysql="SELECT * from alumni where rollno='$_SESSION[rollno]'";  
  $findresult = mysqli_query($db, $querysql);
if($res = mysqli_fetch_array($findresult))
{

$oldname = $res['name'];  
$oldyearofpass=$res['yearofpass']; 
$oldarea = $res['area'];  
$oldposition = $res['position'];  
$oldorganisation= $res['organisation'];
$oldctc=$res['ctc'];
$oldlocation = $res['location'];
$oldstartyear=$res['startyear'];
$oldendYear=$res['endYear'];
$currworking=$res['currworking'];

}
 ?> 
 <!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
   

<div class="container">

    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
           
     <!-- <form action="" method="POST" enctype='multipart/form-data'> -->
  <div class="login_form">
  
<?php 
 $password = "";
 $querysql="SELECT * from alumni where rollno='$_SESSION[rollno]'";
$temp=mysqli_query($db, $querysql) or die ( mysqli_error());



  if($_SERVER['REQUEST_METHOD']==='POST'){
    
    $name= mysqli_real_escape_string($db, $_POST['name']);
    $yearofpass = mysqli_real_escape_string($db, $_POST['yearofpass']);
    $area = mysqli_real_escape_string($db, $_POST['area']);
     $position=mysqli_real_escape_string($db, $_POST['position']);
    $organisation = mysqli_real_escape_string($db,$_POST['organisation']);
    $ctc=mysqli_real_escape_string($db, $_POST['ctc']);
    $location=mysqli_real_escape_string($db, $_POST['location']);  //encrypting password
    // $pass=password_hash($password,PASSWORD_BCRYPT);
    $startyear=mysqli_real_escape_string($db, $_POST['startyear']);
$endYear=mysqli_real_escape_string($db, $_POST['endYear']);
$currworking=mysqli_real_escape_string($db, $_POST['currworking']);
$rollno=$_SESSION['rollno'];
$sql="SELECT * from alumni where rollno='$rollno'";
      $res=mysqli_query($db,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);
$error=0;

  
if (empty($name)) { 
  $error=1;
}
if (empty($area)) { 
  $error=1;
}

if (empty($location)) { 
  $error=1;
}
if (empty($startyear)) { 
  $error=1;
}
if (empty($currworking)) { 
  $error=1;
}
   }
    if($error==0){ 
          
           $result1 = mysqli_query($db,"UPDATE alumni SET name='$name', yearofpass ='$yearpass', area='$area',position ='$position' ,organisation = '$organisation' ,ctc='$ctc', location= '$location', startyear='$startyear', endYear='$endYear', currworking='$currworking'
           WHERE rollno='$rollno'");
          // $result2=mysqli_query($conn,"UPDATE users SET password='$password' where email='$oldemail'");
           if($result1)
           {
            echo "<script>
  alert('Info Updated Successfully');
  window.location.href='alumni_login.php';
  </script>";
       //header("location:alumni_login.php?profile_updated=1");
       
           }
           else 
           {
            echo "<script>
  alert('Info Updated Successfully');
  window.location.href='alumniupdate.php';
  </script>";
           }

    }
    if($error==1) {
        echo "Error Found: ";
    }
   
        
        
//         if(isset($error)){ 

// foreach($error as $error){ 
//   echo '<p class="errmsg">'.$error.'</p>'; 
// }
// }

  }
        ?> 

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
    <a >Edit your details here</a>
              </div>
     <form class="formm" method="post" action="alumniupdate.php">
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
      <input type="text" name="name" value="<?php echo $oldname;?>" >
      <span class="text-danger"   > <?php if (empty($name)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp; </span>
     
    <!-- </div>
    <div class="input-group"> -->

    <label>Year of Passing Out</label>
      <input type="text" name="yearofpass" value="<?php echo $oldyearofpass;?>" >
      <span class="text-danger" ><?php if (empty($yearofpass)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp; </span>

      <label>Area of Work</label>
      <select name="area">
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
      <input type="text" name="position" value="<?php echo $oldposition;?>" >
       &emsp; &emsp; &emsp; &emsp; &emsp; 
    <!-- </div>
    <div class="input-group"> -->
      <label>Organisation/University Name </label>
      <input type="text" name="organisation" value="<?php echo $oldorganisation;?>" >
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
      <input type="text" name="location" value="<?php echo $oldlocation;?>">
      <span class="text-danger" ><?php if (empty($location)) echo "Required"; ?>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</span>
    <!-- </div>
    <div class="input-group"> -->
      <label>Start Year</label>
      <input type="text" name="startyear" value="<?php echo $oldstartyear;?>" >
      <span class="text-danger" ><?php if (empty($startyear)) echo "Required"; ?>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;</span>
    <!-- </div>
    <div class="input-group"> -->
    <p> &emsp; </p>
    <p> &emsp; </p>
      <label>End Year</label>
      <input type="text" name="endYear" value="<?php echo $oldendYear;?>">
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
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>