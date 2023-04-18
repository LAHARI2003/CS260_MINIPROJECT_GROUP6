<?php 
session_start();
require_once("database.php");
if(!ISSET($_SESSION['jobid'])){
    header('location:complogin.php');
}
$querysql="SELECT * from company where jobid='$_SESSION[jobid]'";
$temp=mysqli_query($conn, $querysql) or die ( mysqli_error());
$rowt=mysqli_fetch_assoc($temp);
$jobid=$rowt['jobid'];
// echo "$id";

  
  $findresult = mysqli_query($conn, "SELECT * FROM company WHERE jobid= '$jobid'");
if($res = mysqli_fetch_array($findresult))
{

//$oldjobid = $res['jobid'];   
$oldcomp_name = $res['comp_name'];  
$oldcomp_roles = $res['comp_roles'];  
$oldbranch_res= $res['branch_res'];
$oldcpicut= $res['cpicut'];
$oldctc= $res['ctc'];
$oldmod_inter= $res['mod_inter'];
$oldrecyear= $res['recyear'];
}
 ?> 
 <!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<!-- ENDING STYLE -->
<!-- <div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
           
     <form action="" method="POST" enctype='multipart/form-data'>
  <div class="login_form"> -->
  
<?php 
 $password = "";
 $querysql="SELECT * from company where jobid='$_SESSION[jobid]'";
$temp=mysqli_query($conn, $querysql) or die ( mysqli_error());
$rowt=mysqli_fetch_assoc($temp);
$jobid=$rowt['jobid'];


  if($_SERVER['REQUEST_METHOD']==='POST'){
    
    //$jobid= mysqli_real_escape_string($conn, $_POST['jobid']);
    $comp_name = mysqli_real_escape_string($conn, $_POST['comp_name']);
     $comp_roles=mysqli_real_escape_string($conn, $_POST['comp_roles']);
    $branch_res = mysqli_real_escape_string($conn,$_POST['branch_res']);
    $cpicut = mysqli_real_escape_string($conn,$_POST['cpicut']);
    $ctc = mysqli_real_escape_string($conn,$_POST['ctc']);
    $mod_inter = mysqli_real_escape_string($conn,$_POST['mod_inter']);
    $recyear = mysqli_real_escape_string($conn,$_POST['recyear']);
    
$sql="SELECT * from company where jobid='$jobid'";
      $res=mysqli_query($conn,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

$error=0;
   
   
}
    if($error==0){ 
          
           $result1 = mysqli_query($conn,"UPDATE company SET comp_name='$comp_name', comp_roles ='$comp_roles' ,branch_res = '$branch_res' WHERE jobid='$jobid'");
          // $result2=mysqli_query($conn,"UPDATE users SET password='$password' where email='$oldemail'");
          if($result1){
   
            echo "<script>
            alert('Updated Successfully');
            window.location.href='complogin.php';
            </script>";
            // $_SESSION['success'] = "You have submitted your details";
           }
            else{
              echo "<script>
            alert('Couldn't update');
            window.location.href='compdetails.php';
            </script>";
            }
    //         } if($result1)
    //        {
    // //    header("location:complogin.php?profile_updated=1");
    // //    echo "updated Successfully!!";
    //        }
    //        else 
    //        {
    //         echo "Something went wrong";
    //        }

    }
    if($error==1) {
        echo "Error Found: ";
    }
   
        }
        
//         if(isset($error)){ 

// foreach($error as $error){ 
//   echo '<p class="errmsg">'.$error.'</p>'; 
// }
// }


        ?> 

<style>

  
.text-center{
  color:white;
  justify-content: center;
  display: flex;
}

.formm{
  justify-content: center;
  
  width:900px;
  height:650px;
  margin-top:90px;
  margin-left:90px;
}
body {
background-color: #002D72;
display: flex;
justify-content: center; 
/* align-items: center;
height: 100vh;
/* margin: 0; */
}

  
  .header{
  margin-top:-10px;
   width:400px;
}
  html, body {
height: 100%;
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
  
  display: flex;
  }



            </style>


<form class="formm" method="post" action="compupdate.php">
  <?php $errors = array(); // Initialize $errors as an empty array ?>
  <?php if (count($errors) > 0) : ?>
    <div class="error">
      <?php foreach ($errors as $error) : ?>
        <p><?php echo $error ?></p>
      <?php endforeach ?>
    </div>
  <?php endif ?>
  
  <div class="header">
  <h2>Update Your Company Info</h2>
</div>
  

  <div class="input-group">
    <label>Company Name</label>
    <input type="text"
     name="comp_name" value="<?php echo $oldcomp_name;?>" >
     <span class="text-danger" ><?php if (empty($comp_name)) echo "Required"; ?></span>
  </div>

  <div class="input-group">
    <label>Roles you are going offering Here?</label>
    <select name="comp_roles">
      <option value="">--Select--</option>
      <option value="SDE">SDE</option>
      <option value="Management">Management</option>
      <option value="Data Scientist">Data Scientist</option>
      <option value="Production">Production</option>
      <option value="Core Related">Core Related</option>
    </select>
    <span class="text-danger" ><?php if (empty($comp_roles)) echo "Required"; ?></span>
  </div>
  <div class="input-group">
    <label>is this role open to all branches?</label>
    <select name="branch_res">
      <option value="">--Select--</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
      <option value="Open to only circuital branches">Open to only circuital branches</option>
    </select>
    <span class="text-danger" ><?php if (empty($branch_res)) echo "Required"; ?></span>
  </div>
  <div class="input-group">
    <label>CGPA cutoff</label>
    <input type="number" step="0.01"
     name="cpicut" value="<?php echo $oldcpicut; ?>">
     <span class="text-danger" ><?php if (empty($cpicut)) echo "Required"; ?></span>
  </div>
  <div class="input-group">
    <label>CTC</label>
    <input type="varchar" 
    name="ctc" value="<?php echo $oldctc; ?>">
    <span class="text-danger" ><?php if (empty($ctc)) echo "Required"; ?></span>
  </div>
  <div class="input-group">
    <label>Mode of Interview</label>
    <select name="mod_inter">
      <option value="">--Select--</option>
      <option value="Online">Online</option>
      <option value="Offline">Offline</option>
    </select>
    <span class="text-danger" ><?php if (empty($mod_inter)) echo "Required"; ?></span>
  </div>
  <div class="input-group">
    <label>From which year Have you been recruiting from IIT Patna?</label>
    <input type="number" 
    name="recyear" value="<?php echo $oldrecyear; ?>">
    <span class="text-danger" ><?php if (empty($recyear)) echo "Required"; ?></span>
  </div>

  </div>
  <div class="btn_container">
    <button type="submit" class="btn" name="update">Update</button>
  </div>
</form>
    

</body>

</html>