<?php 
  include('mini3server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<style>

  
.text-center{
  color:white;
  justify-content: center;
  display: flex;
}

.formm{
  justify-content: center;
  
  width:1300px;
  height:650px;
  margin-top:90px;
  /* margin-left:-100px; */
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

  
  <form class="formm" method="post" action="compdetails.php">
    <?php $errors = array(); // Initialize $errors as an empty array ?>
    <?php if (count($errors) > 0) : ?>
      <div class="error">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
      </div>
    <?php endif ?>
    
    <div class="header">
    <h2>Register your Company Here</h2>
  </div>
    

    <div class="input-group">
      <label>Company Name</label>
      <input type="text"
       name="comp_name" >
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
       name="cpicut" value="<?php echo $cpicut; ?>">
       <span class="text-danger" ><?php if (empty($cpicut)) echo "Required"; ?></span>
    </div>
    <div class="input-group">
      <label>CTC</label>
      <input type="varchar" 
      name="ctc" value="<?php echo $ctc; ?>">
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
      name="recyear" value="<?php echo $recyear; ?>">
      <span class="text-danger" ><?php if (empty($recyear)) echo "Required"; ?></span>
    </div>

    </div>
    <div class="btn_container">
      <button type="submit" class="btn" name="det_comp">Submit</button>
    </div>
</form>

</body>
</html>
