<?php
session_start();
$username = "";
$email = "";
$errors = array();

// Connect to the doggoDatabase
$db = mysqli_connect('localhost', 'root', '', 'doggoRegistration');

// When register button is clicked
if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $psw = mysqli_real_escape_string($db, $_POST['psw']);
    $pswrepeat = mysqli_real_escape_string($db, $_POST['psw-repeat']);

    // Ensure form fields are filled correctly
    if(empty($username)) {
        array_push($errors, "Please enter a username");
    }
    if(empty($email)) {
        array_push($errors, "Please enter an email");
    }
    if(empty($psw)) {
        array_push($errors, "Please enter a password");
    }
    if($psw != $pswrepeat) { 
        array_push($errors, "Passwords do not match");
    }

    // Save users to database
    if(count($errors) == 0) {
        //Encrpyt password before storing into db
        $password = md5($psw);

        $sql_u = "SELECT * FROM users WHERE username='$username'";
  	    $sql_e = "SELECT * FROM users WHERE email='$email'";
  	    $res_u = mysqli_query($db, $sql_u);
  	    $res_e = mysqli_query($db, $sql_e);

  	    if (mysqli_num_rows($res_u) > 0) {
            $name_error = "Sorry... username already taken";
            
            //When registration fails it doesn't bring up the signup form
            //TODO:
            header('location: register.php');	
        }
        else if(mysqli_num_rows($res_e) > 0) {
            $email_error = "Sorry... email already taken";

            //When registration fails it doesn't bring up the signup form
            //TODO:
            header('location: register.php'); 	
        }
        else {
            $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username', '$email', '$psw')";

            mysqli_query($db, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['sucess'] = "You are now logged in";
            header('location: homepage.php');
        }
    }

}

//Login from login.php page
if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $psw = mysqli_real_escape_string($db, $_POST['psw']);

    // Ensure form fields are filled correctly
    if(empty($username)) {
        array_push($errors, "Please enter a username");
    }
    if(empty($psw)) {
        array_push($errors, "Please enter a password");
    }

    // Save users to database
    if(count($errors) == 0) {
        //Encrpyt password before storing into db
        $password = md5($psw);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$psw'";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1) {
            //Log user in
            $_SESSION['username'] = $username;
            $_SESSION['sucess'] = "You are now logged in";
            header('location: homepage.php');
        } else {
            array_push($errors, "Incorrect login information");
        }
        
    }
}

//Logging out
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>