<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css"/>
  <script rel="script" src="js/script.js" defer></script>
</head>

<body background = "https://thumbs.dreamstime.com/b/green-white-dog-paw-prints-tile-pattern-repeat-background-seamless-repeats-60529706.jpg">

<div class="content">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['sucess']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php if (isset($_SESSION["username"])): ?>
        <p>Welcome to your Homepage <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p><a href="homepage.php?logout='1'" style="color: red;">Logout</a></p>
    <?php endif ?>
</div>

  
</body>
