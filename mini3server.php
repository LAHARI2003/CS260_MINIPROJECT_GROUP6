<?php
session_start();
if(isset($_SESSION['jobid'])) { // check if user is logged in
    $jobid = $_SESSION['jobid']; // get user's email from session
    // query the database to get user's information
    $conn = new mysqli('localhost', 'root', '', 'placementdb');
    $sql = "SELECT * FROM compreg WHERE jobid='$jobid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      
      $jobid = $row['jobid'];
    }}
    
// initializing variables
$comp_name="";
$comp_roles="";
$branch_res="";
$cpicut = "";
$ctc = "";
$mod_inter="";
$recyear= "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'placementdb');

// REGISTER USER
if (isset($_POST['det_comp'])) {
  // receive all input values from the form
  $comp_name = mysqli_real_escape_string($db, $_POST['comp_name']);
  $comp_roles = mysqli_real_escape_string($db, $_POST['comp_roles']);
  $branch_res = mysqli_real_escape_string($db, $_POST['branch_res']);
  $cpicut = mysqli_real_escape_string($db, $_POST['cpicut']);
  $ctc = mysqli_real_escape_string($db, $_POST['ctc']);
  $mod_inter = mysqli_real_escape_string($db, $_POST['mod_inter']);
  $recyear = mysqli_real_escape_string($db, $_POST['recyear']);
  
  
 /*$img_name = $_FILES['my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_name = $_FILES['my_image']['tmp_name'];
$error= $_FILES['my_image']['error'];
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if($error === 0){
    if($img_size > 125000){
      $em = "your file is too large";
      header("Location: details.php?error=$em");
    }else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png");
      if(in_array($img_ex_lc, $allowed_exs)){
        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_;
        $img_upload_path = 'miniview/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
      }else{
        $em="you can't upload files of this type";
        header("Location: details.php?error=$em");
      }
    }
  }else{
    $em = "Unknown error occurred";
    header("Location: details.php?error=$em");
  }
*/
  
if (empty($comp_name)) { 
    array_push($errors, "Mentioning the company name is necessary");
    //echo "Mentioning the company name is necessary"; 
  }

  if (empty($comp_roles)) { 
    array_push($errors, "Mentioning the roles which company is going to offer is necessary");
    //echo "Mentioning the roles which company is going to offer is necessary"; 
  }
  
  if (empty($branch_res)) { 
    array_push($errors, "branch restrictions are necessaary to mention");
    //echo "branch restrictions are necessaary to mention"; 
  }
  if (empty($ctc)) { 
    array_push($errors, "Mentioning a approximate ctc you are going to offer is necessary");
    //echo "Mentioning a approximate ctc you are going to offer is necessary"; 
  }

  if (empty($cpicut)) { 
    array_push($errors, "Minimum cpi cutoff needs to be mentioned");
    //echo "Minimum cpi cutoff needs to be mentioned"; 
  }
  if (empty($mod_inter)) { 
    array_push($errors, "It is necessary to mention the mode of interview which the company will be taking");
    //echo "It is necessary to mention the mode of interview which the company will be taking"; 
  }
  if (empty($recyear)) { 
    array_push($errors, "It is necessary to mention the year your company has started recruting Students from IIT PATNA");
    //echo "It is necessary to mention the year your company has started recruting Students from IIT PATNA"; 
  }
  

  // first check the database to make sure 
  // a user does not already exist with the same email
//   $user_check_query = "SELECT * FROM register WHERE rollno='$rollno' LIMIT 1";
//   $result = mysqli_query($db, $user_check_query);
//   $user = mysqli_fetch_assoc($result);
  
//   if ($user) { // if user exists
//     if ($user['rollno'] === $rollno) {
//       array_push($errors, "Student already registered");
//     }
//   }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    //encrypt the password before saving in the database

    $query = "INSERT INTO company (jobid, comp_name, comp_roles, branch_res, ctc, cpicut, mod_inter, recyear) 
              VALUES('$jobid', '$comp_name','$comp_roles', '$branch_res', '$ctc', '$cpicut', '$mod_inter', '$recyear')";
    $q=mysqli_query($db, $query);
    if($q){
   
      echo "<script>
      alert('Info submitted Successfully');
      window.location.href='companyview.php';
      </script>";
      $_SESSION['success'] = "You have submitted your details";
     }
      else{
        echo "<script>
      alert('Your data already present');
      window.location.href='compdetails.php';
      </script>";
      }
    // $_SESSION['success'] = "You have submitted your details";
    // header('location: companyview.php');
  }
}
/*}else{
  header("Location:details.php");
}*/