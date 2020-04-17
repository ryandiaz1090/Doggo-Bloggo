<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome to Doggo Bloggo!</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css"/>
  <script rel="script" src="js/script.js" defer></script>
</head>

<body background="https://thumbs.dreamstime.com/b/green-white-dog-paw-prints-tile-pattern-repeat-background-seamless-repeats-60529706.jpg">


<h2 style = "font-family: verdana"><center>Welcome to Doggo Bloggo!</center></h2>
<h3 style = "font-family: Arial"><center>A blog dedicated to the sole purpose of people being able to show their dogs!</center></h3>

<br>
<center>
<div class="square">
<img src="https://www.sciencemag.org/sites/default/files/styles/article_main_large/public/dogs_1280p_0.jpg?itok=cnRk0HYq" alt="Parent and Child" width="1000" height="600">
</div>
</center>

<center>
<button type="button" class="loginbtn" style="display:block; width:auto;"><a href="login.php">Login</a></button>
<button onclick="document.getElementById('DG').style.display='block'" style="width:auto;">Sign Up Today!</button>
</center>

<div id="DG" class="model">
  <span onclick="document.getElementById('DG').style.display='none'" class="close" title="Close Model">&times;</span>
  <form class="model-content" method="POST" action="register.php">
      <!-- Display validation errors -->
      <?php include('errors.php'); ?>
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <!-- Username already taken in database -->
      <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	      <?php if (isset($name_error)): ?>
	  	  <span><?php echo $name_error; ?></span>
	      <?php endif ?>
  	  </div>
      <label for="username"><b>Username</b></label>
      <input type="text"  name="username" value="<?php echo $username; ?>">
      <span id="error-user"></span>

      <!-- Email already taken in database -->
      <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
        <?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
        <?php endif ?>
  	  </div>
      <label for="email"><b>Email</b></label>
      <input type="text"  name="email" value="<?php echo $email; ?>">
      <span id="error-email"></span>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <span id="error-pass"></span>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      <span id="error-repear"></span>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>
      
      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('DG').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name='register' class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<script>

var model = document.getElementById('DG');

window.onclick = function(event) {
  if (event.target == model) {
    model.style.display = "none";
  }
}
</script>

</body>
</html> 
