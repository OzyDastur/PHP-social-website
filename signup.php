<?php

include ("classes/connect.php");
include ("classes/validate_signup.php");

$first_name = "";
if(isset($_POST['signup'])){

    $connect = new Database_connection();
    $connection = $connect->connect();


    $first_name = mysqli_real_escape_string($connection,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password= mysqli_real_escape_string($connection, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($connection,$_POST['confirm_password']);

    $signup = new Signup();
    $signup->validate($first_name,$last_name,$gender,$email,$password,$confirm_password);

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
    
    <link rel="stylesheet" href="styles/signup.css">
    <title>Assakenah | Signup</title>
  </head>
  <body>
  <div class="container-fluid">
  
    <nav class="navbar navbar-expand-md  navbar-dark bg-dark " >
    
        <div class="navbar-brand pt-1 pb-1"><img src="images/logo2.png" height="55" width="55" alt=""></div>
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
  <?php if(isset($_GET['success_message'])){ ?>

    <p class="alert alert-success" role="alert"> <?php echo  "Congratulations you've successfully singed up! Please click on this link to sign in "; ?><a href="login.php">Log in</a> </p> 

<?php }?> 

  <div class="signup-wrapper">
       
        <form action="" method="POST">
            
        
        <h3>Sign Up</h3>
       
        <div class="mb-3" >
     
            <input type="text" class="form-control" name="first_name" placeholder="First Name">
        
        </div>
        <div class="mb-3">
       
            <input  type="text" class="form-control" name="last_name" placeholder="Last Name">
      
        </div>
        
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
        <label class="form-check-label" for="male">
        Male
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" >
        <label class="form-check-label" for="female">
        Female
        </label>
        </div>
        <div class="mb-3">
       
            <input  type="text" class="form-control" name="email" placeholder="Email" >
      
        </div>
        <p style="color:red">
            <?php
                if(isset($_GET['invalid_email'])){
                    echo "Invalid email address.";
                }
            ?>
        </p>
        <div class="mb-3">
            
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
            
        <p style="color:red">
            <?php
                if(isset($_GET['invalid_password'])){
                    echo "Password must at least:<br> Be 6 characters <br> Contain an uppercase <br>. Contain a lowercase <br> Contain a number <br> Contain a special character ";
                }
            ?>
        </p>

        
        <div class="mb-3">
            
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
        </div>
        <p style="color:red">
            <?php
                if(isset($_GET['password_mismatch'])){
                    echo "The two password don't match";
                }
            ?>
        </p>
        
        <button type="submit" name="signup"  class="btn btn-primary">Signup</button> <br><br>
        <div class="login-link">
            <span>Already a member? Sign in here </span><a href="login.php">Log in</a>
        </div>
        </form>
        <p style="color:red">
            <?php
                if(isset($_GET['empty_fields'])){
                    echo "All fields must be completed";
                }
            ?>
        </p>
 
    </div>
 <?php

    include ("footer.php");

?>