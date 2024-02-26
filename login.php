<?php 
require 'function.php';
if(!isset($_SESSION['login'])){

} else {
    header('location:index.php');
}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
    .container {
        width: 30%;
        margin-top: 9%;
        box-shadow: 0 3px 20px rgba(0,0,0,0.3);
        padding: 40px;
    }

button {
    width: 100%;
}
    </style>
    </head>
    <body>
    <div class="container">
        <h3 class="text-center">LOGIN</h3>

        <form action="" method="POST">
            <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                <div class="input-group-prepend"></div>
                 <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
            </div><br>

            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <div class="input-group-prepend"></div>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3" name="login">Login</button>
        </form>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
