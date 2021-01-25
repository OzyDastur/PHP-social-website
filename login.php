<?php

//To be able to access classes inside these files
include ("classes/connect.php");
include ("classes/validate_login.php");

$email = "";
$password = "";

if(isset($_POST['login'])){

    $connect = new Database_connection();
    $connection = $connect->connect();
    
    

    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password= mysqli_real_escape_string($connection, $_POST['password']);
    

    $login = new Login();
    $login->validate($email,$password);

}



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Anton&family=Archivo+Black&family=Righteous&family=Ultra&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/login.css">
    <title>Assakenah | Log In</title>
  </head>
  <body>
 
  <div class="container-fluid">
    
    <nav class="navbar navbar-expand-md  navbar-dark bg-dark " >
    
        <div class="navbar-brand pt-1 pb-1"><img src="images/logo1.png" height="55" width="55" alt=""></div>
        <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#hamburger">
            <span class="navbar-toggler-icon "></span>
        </button>
       
        <div class="collapse navbar-collapse pt-1 pb-1" id="hamburger">
            
            <span class="navbar-text pt-1 pb-1">Assakenah</span>
            
            <ul class="navbar-nav ms-auto pt-1 pb-1" >
               
                <li class="nav-item "><a href="#" class="nav-link">Home</a></li>
                <li class="nav-item "><a href="#" class="nav-link">About</a></li>
                <li class="nav-item dropdown "><a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-target="#caret" >
                    Portfolio
                    <span class="caret"></span>
                </a>
                    <ul class="dropdown-menu" aria-labelledby="caret">
                        <li><a href="#" class="drodown-item">Link </a></li>
                        <li><a href="#" class="drodown-item">Link </a></li>
                        <li><a href="#" class="drodown-item">Link </a></li>
                        <li><a href="#" class="drodown-item">Link</a></li>
                    </ul>
            
                </li>
                <li class="nav-item "><a href="#" class="nav-link ">Services</a></li>
                <li class="nav-item "><a href="#" class="nav-link ">Contact</a></li>
            
            </ul>
        
        
        </div>
    
        
    </nav>
  
  <div class="login-wrapper">
       
        <form action="" method="POST">
            <h1> Log In</h1>
        <div class="mb-3">
           
            <input  type="text" class="form-control" name="email" placeholder="Email" >
            
        </div>
        <p style="color:red;">
            <?php
                if(isset($_GET['invalid_email'])){

                    echo "Invalid email.";
                }

            ?>
        </p>

        <div class="mb-3">
            
            <input  type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <p style="color:red">
            <?php
                if(isset($_GET['invalid_password'])){
                    echo "Invalid password.";
                }
            ?>
        </p>
      

        <button type="submit" name="login"  class="btn bt-primary">Log In</button>
       
        <p style="color:red">
            <?php
                if(isset($_GET['empty_fields'])){
                    echo "Please fill all the fields";
                }
            ?>
        </p>
        <div class="singup-link">
            <span>A new member? Sign up here </span><a href="signup.php">Signup</a>
        </div>
        </form>
    
    </div>
   
   
   <?php

    include ("footer.php");

    ?>