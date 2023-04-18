<?php 
  include('mini1server.php');
?>
<?php
//$conn = mysqli_connect('localhost', 'root', '', 'placementdb');

if(isset($_POST['details_user'])){

    $file = $_FILES['image']['name'];

    $query = "INSERT INTO upload(rollno, image) VALUES('$rollno', '$file')";
    $res = mysqli_query($conn,$query);
    if ($res){
        
        move_uploaded_file($_FILES['image']['tmp_name'],"$file");

    }
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
  margin-top:60px;
  margin-left:-10px;
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

<div class="container">
<p>To Fill Your Grades: <a href="CSE.php"> Click Here</a>.</p>
<div class="text-center">
        <h1>Student Application</h1>
      </div>
      <p> &emsp;</p>
<div class="text-center">
    <a >                                                                                    Enter your details here</a>
              </div>
    
  <form class ="formm" method="post" action="details.php" enctype = "multipart/form-data">
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
      <input type="text" name="webmail" value="<?php echo $webmail; ?>">
      <span class="text-danger" ><?php if (empty($webmail)) echo "Required"; ?> &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>

    <!-- <div class="input-group"> -->
    <label>Mobile No.</label>
      <input type="text" name="mobile" value="<?php echo $mobile; ?>">
      <span class="text-danger" ><?php if (empty($mobile)) echo "Required"; ?> &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>

      
      <p> &emsp; </p>
      <label>10th Marks (in percentage)</label>
      <input type="text" name="tenth" value="<?php echo $tenth; ?>">
      <span class="text-danger" ><?php if (empty($tenth)) echo "Required"; ?>  &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>

    <!-- </div>
    <div class="input-group"> -->
    <label>12th Marks (in percentage)</label>
      <input type="text" name="twelve" value="<?php echo $twelve; ?>">
      <span class="text-danger" ><?php if (empty($twelve)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>
       
       <p> &emsp; </p>
      <label>CGPA/CPI</label>
      <input type="number" step="0.01" name="cpi" value="<?php echo $cpi; ?>">
      <span class="text-danger" > &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;;&emsp; &emsp;;&emsp; &emsp;</span> 

      <label>Upload transcript link here: </label>
      <input type="text" name="transcript"  ?>
      <span class="text-danger" ><?php if (empty($transcript)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; </span>
        <!-- </div>
    <div class="input-group"> -->
    <p> &emsp; </p>
      <label>Age(in years)</label>
      <input type="text" name="age" value="<?php echo $age; ?>">
      <span class="text-danger" ><?php if (empty($age)) echo "Required"; ?>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp; </span>
    <!-- </div>
    <div class="input-group"> -->
   
      <label>Specialization</label>
      <select name="branch">
        <option value="">--Select--</option>
        <option value="CSE">CSE</option>
        <option value="EEE">EEE</option>
        <option value="CIVIL">CIVIL</option>
        <option value="MME">MME</option>
        <option value="Mechanical">Mechanical</option>
        <option value="CBE">CBE</option>
        <option value="MNC">MNC</option>
        <option value="AI$DS">AI$DS</option>
      </select>
     
      <span class="text-danger" ><?php if (empty($branch)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp; </span>
      <p> &emsp; </p>
      
    <!-- </div>
    <div class="input-group"> -->
    
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
      <input type="number" name="year" value="<?php echo $year; ?>">
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
      <input type="text" name="company" class="form-control">
      &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp; 
      <label>CTC(if placed)</label>

     
      <input type="number" name="ctc" value="<?php echo $ctc; ?>">
      <span class="text-danger" ><?php if (empty($ctc)) echo "Required"; ?> </span>
    <!-- </div>
    <div class="input-group"> -->

    
       &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;

       <p> &emsp; </p>
      <label>Upload your Image</label>
      <input type="file" name="image" class="form-control">
      <span class="text-danger" ><?php if (empty($file)) echo "Required"; ?> &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; </span>
    <!-- </div>
    <div class="input-group"> -->
    <p> &emsp; </p>
    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 
      <button type="submit" class="btn" name="details_user">Submit</button>
    </div>
        </div>
</form>


</body>
</html>
