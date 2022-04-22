<?php
session_start();
if(!empty($_SESSION["name"])) {
    header('location:contact.php');
}
require_once('userFunctionDb.php');
    $error          = "";
    $username       = null;
    $pass           = null;
    $user           = new user();

if (isset($_POST['login'])) {
   $_SESSION['date_last_login'] = date()
     $username       = $_POST['username'];       
     $pass           = $_POST['password'];
     $user->SetName($_POST['username']);
     $user->SetPassword($_POST['password']);

    if($user->login()) {
        header("Location: profil.php");
    } else {
    $error = "Username or password is incorrect!";
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
        <a class="text-white" href="signup.html">signup</a>
    </nav>
    <form method="$_POST" class="container bg-white mt-5 shadow-lg p-3 mb-5 bg-body rounded" style="max-width: 475px">
        <div class=" container bg-red"><h1></div>
        <h2 class="pt-3 text-center">LOGIN</h2>
        <div class="opacity-75">
          <p class="pt-3 text-center">Entrer your credentials to access your account</p>
        </div>
        <div class="mb-3">
          <label  class="form-label">Email</label>
          <div class="opacity-50">
            <input type="email" name="email" class="form-control" placeholder="Entrer your email">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <div class="opacity-50">
            <input type="password" name="password" class="form-control" placeholder="Entrer your password">
          </div>
        </div>
        
        <button type="submit" name="login" class="d-grid btn btn-dark text-white">LOGIN</button>
        
        <p class="text-center mt-3"><span> <a class="text-black-50" href="signup.html">signup</a> </span> </p>
      </form>
    
</body>
</html>