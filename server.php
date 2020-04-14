<?php

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
        $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username', '$email', '$psw')";

        mysqli_query($db, $sql);
    }

}
?>