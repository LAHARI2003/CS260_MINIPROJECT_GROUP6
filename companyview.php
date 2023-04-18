
<?php 
session_start(); // start the session
if(isset($_SESSION['jobid'])) { // check if user is logged in
  $jobid = $_SESSION['jobid'];
   // get user's email from session
  // query the database to get user's information
  $conn = new mysqli('localhost', 'root', '', 'placementdb');
  $sql = "SELECT * FROM company WHERE jobid='$jobid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $comp_name= $row['comp_name'];
    $comp_roles = $row['comp_roles'];
    $branch_res = $row['branch_res'];
    $cpicut = $row['cpicut'];
    $ctc= $row['ctc'];

    $mod_inter = $row['mod_inter'];
    $recyear = $row['recyear'];
    
  }}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
 <style>
  .container {
    background-color: white;
    padding: 20px;
    text-align: center;
    width: 500px;
  }

  body {
    background-color: #002D72;
    display: flex;
    justify-content:center;
    align-items: left;
  }
  
  table {
    border-collapse: collapse;
    margin: auto;
    width: 80%;
  }
  
  th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: left;
  }
  
  th {
    background-color: #002D72;
    color: white;
  }
  
  .text-center{
    color:white;
    justify-content:center;
    margin-left:50px;
  }
</style>

<body>
  <div>
    <h1 class="text-center">YOUR COMPANY DETAILS</h1>
    <div class="container">
      <table>
        <tr>
          <th>Company ID</th>
          <td><?php echo $jobid; ?></td>
        </tr>
        <tr>
          <th>Company</th>
          <td><?php echo $comp_name; ?></td>
        </tr>
        <tr>
          <th>Role</th>
          <td><?php echo $comp_roles; ?></td>
        </tr>
        <tr>
          <th>Branch</th>
          <td><?php echo $branch_res; ?></td>
        </tr>
        <tr>
          <th>Minimum CPI</th>
          <td><?php echo $cpicut; ?></td>
        </tr>
        <tr>
          <th>CTC</th>
          <td><?php echo $ctc; ?></td>
        </tr>
        <tr>
          <th>Mode of Interview</th>
          <td><?php echo $mod_inter; ?></td>
        </tr>
        <tr>
          <th>Recruiting Since</th>
          <td><?php echo $recyear; ?></td>
        </tr>
      </table>
      <p> &emsp; </p>
      <form method="post" action="compview.php">
        <input type="submit" name="goback" value="Go Back">
      </form>
      <p>To Update: <a href="compupdate.php"> Update</a>.</p>
      <p>To Delete: <a href="compdelete.php"> Delete</a>.</p>
    </div>
  </div>
</body>
</html>

