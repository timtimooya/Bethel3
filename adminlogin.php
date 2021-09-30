<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/favicon.ico" />
  <title>Bethel Institute of Technology</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://kit.fontawesome.com/e9974bda55.js" crossorigin="anonymous"></script>-->
  <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
   <link rel="stylesheet" href="bootstrap\private css\style.css">      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="bootstrap\js\bootstrap.min.js"></script>
   <script src="bootstrap\jq\jquery.js"></script> 
<script>
 
    setTimeout(function(){
    document.getElementById('message').style.display = 'none';
   
  }, 2000);
</script>
</head>
    <body>

<div class="container">
<div class="row"></div>
   <div class="row"> 
    <div class="col-md-4"></div>
    <div class="col-md-4"> 
    <div class="adminloginform">
    <fieldset >
  <h2>Admin Login</h2>
  <form action="validation.php" method="post">
    <div class="form-group">
      <label for="Username">Username:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter Username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
       <?php 
          if(isset($_SESSION['errorMessage'])){
            echo "<span id='message' style ='color:red;'>Wrong Username or Password!</span>";

          } ?>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
      <div class="row justify-content-center">
         <button type="submit" class="btn btn-info btn-block" name="login"><span class="glyphicon glyphicon-off"></span> Login</button></div>
  </form>
    </fieldset>
        </div></div>
      <div class="col-md-4"></div> 
        </div>
    </div> 
</body>
 <?php
  unset($_SESSION['errorMessage']);
  ?>
</html>