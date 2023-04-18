<?php 
  include('studdoubtsserver.php');
?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <style>
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
  margin-left:50px;
  display: flex;
  }
  </style>
    <div class="header">
      <h2>Enter your queries here</h2>
    </div>
      
    <form method="post" action="studdoubts.php">
      <?php $errors = array(); // Initialize $errors as an empty array ?>
      <?php if (count($errors) > 0) : ?>
        <div class="error">
          <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    
      
        <label>Query
        </label>
        <input type="text" name="query" value="<?php echo $query; ?>">
        <div class="input-group">
        <button type="submit" class="btn" name="querystu_user"> Submit </button>
      </div>

  </form>

  </body>
  </html>