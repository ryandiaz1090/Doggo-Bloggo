<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css"/>
  <script rel="script" src="js/script.js" defer></script>
</head>

<body background = "https://thumbs.dreamstime.com/b/green-white-dog-paw-prints-tile-pattern-repeat-background-seamless-repeats-60529706.jpg">

    <form class="model-content" method="POST" action="login.php" id="login-form">
    <div class="container">
      <h1>Sign In</h1>
      <hr>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      <span id="error-user"></span>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <span id="error-pass"></span>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <center>
      <button type="login" class="submitbtn">Login</button>
      <button type="button" class="homebtn"><a href="index.html">Cancel</a></button>
      </center>
    </div>
    
    <div class="clearfix">
    <center>
        <span class="forgotpsw">Forgot password?</span>
    </center>
      </div>
  </form>
  
</body>
