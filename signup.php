<?php
session_start();
if(!empty($_SESSION["name"])) {
    header('location:contact.php');
}
require_once('userFunctionDb.php');
$error      = "";
$username   = null;
$pass       = null;
$cpass      = null;
$user       = new user();

if (isset($_POST['signup'])){
    $username = $_POST['username'];       
    $pass     = $_POST['password'];
    $cpass    = $_POST['cpassword'];
    $user->SetName($_POST['username']);
    $user->SetPassword($_POST['password']);
    if($user->addUser()) {
            header("Location:login.php?done=Your account has been created successfully! Try to login.");
    } else {
    $error="Username is already in use! Please try another one.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-light bg-black bg-opacity-75 px-3">
        <h1 class="title text-white ">contact list</h1>
        <a class="text-white" href="login.html">Login</a>
    </nav>
    <form method="POST" class="container bg-white mt-5 shadow-lg p-3 mb-5 bg-body rounded" style="max-width: 475px">
        <div class=" container bg-red"><h1></div>
        <h2 class="pt-3 text-center">SIGN UP</h2>
        <div class="opacity-75">
          <p class="pt-3 text-center">Entrer your credentials to access your account</p>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Email</label>
          <div class="opacity-50">
            <input type="email" name="email" class="form-control" placeholder="Entrer your email">
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="opacity-50">
            <input type="password" name="password" class="form-control" placeholder="Entrer your password">
          </div>
        </div><div class="mb-3">
          <label for="password" class="form-label">Confirm Password</label>
          <div class="opacity-50">
            <input type="password" name="confirmpassword" class="form-control" placeholder="Entrer your password">
          </div>
        </div>
        
        <div class="d-grid">
          <a href="login.html"class="btn btn-dark text-white">SIGN UP</a>
        </div>
        <p class="text-center mt-3"><span> <a class="text-black-50" href="login.html">Login</a> </span> </p>
      </form>
    
</body>
</html>