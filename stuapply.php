
<?php 
session_start();
require_once("database.php");
if(!ISSET($_GET['jobid'])){
    header('location:stuwelcome.php');
    echo "not working";
}
$jobid = $_GET['jobid'];
$rollno =  $_SESSION['rollno'];

// echo $jobid;
// echo $rollno;

$querysql="SELECT * from company where jobid='$jobid'";
$temp=mysqli_query($conn, $querysql) or die ( mysqli_error());
 //$rowt=mysqli_fetch_assoc($temp);
// $jobid=$rowt['jobid'];
// echo "$id";
  
  
 // $findresult = mysqli_query($conn, $querysql);
if($res = mysqli_fetch_assoc($temp))
{

//$jobid = $res['jobid'];   
$comp_name = $res['comp_name'];  
$comp_roles = $res['comp_roles'];  


}
//  echo $comp_name;
//  echo $comp_roles;

//  $querysql="SELECT * from company where jobid='$_SESSION[jobid]'";
// $temp=mysqli_query($conn, $querysql) or die ( mysqli_error());
// $rowt=mysqli_fetch_assoc($temp);
// $jobid=$rowt['jobid'];


  

   if(isset($_REQUEST['insert'])){

    $query = "INSERT INTO `stuapply`(`rollno`, `jobid`, `comp_name`, `comp_roles`) VALUES ('$rollno','$jobid','$comp_name','$comp_roles')";
    $q=mysqli_query($conn, $query);
    if($q){
        echo "<script>
    alert('Applied Successfully');
    window.location.href='miniplacement.php';
    </script>";
        $_SESSION['success'] = "You have submitted your details";
        //header('location: miniplacement.php');
    }
    else {
        echo "<script>
        alert('Not Applied!, Try Again');
        window.location.href='miniplacement.php';
        </script>";
    }

   }
   if(isset($_REQUEST['ninsert'])){
    echo "<script>
    alert('Not Applied');
    window.location.href='miniplacement.php';
    </script>";
   }

        ?> 
     
     <!DOCTYPE html>
     <html>
     <link rel="stylesheet" type="text/css" href="style.css">
     <body>
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

width:500px;
height: 100px;
margin-top:60px;

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
     <form class="formm" method="post">
        <a> Are you sure to apply to <?php echo $comp_name?> for <?php echo $comp_roles?> role?</a>
     <div class="input-group">
     &emsp;&emsp;&emsp;
      <button type="submit" class="btn" name="insert">YES</button>
      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      
      <button type="submit" class="btn" name="ninsert">NO</button>
    </div>

   
</form>
</body>
</html>
