<?php
session_start();
include('includes/db_connection.php');
if(isset($_POST['login'])) {
    $email=$_POST['username'];
    $password=$_POST['password'];
    $sql ="SELECT username,password FROM admin WHERE username='$email' and password='$password'";
    $query= mysqli_query($con, $sql);
    $results= mysqli_fetch_all($query,MYSQLI_ASSOC);

    if(mysqli_num_rows($query) > 0) {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <title>Ecommerce | Admin Login</title>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>

<div class="login-page bk-img">
    <div class="form-content">
        <div class="container ">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 col-md-offset-3 mt-5">
                    <h1 class="text-center fw-bold">Admin | Sign in</h1>
                    <div class="row p-5 bk-light">
                        <div class="col-md-8 col-md-offset-3">
                            <form method="post" class="ms-5">
                                <div class="mb-3">
                                    <label for="" class="text-uppercase text-sm form-label fw-bold">Admin Username </label>
                                    <input type="text" placeholder="Username" name="username" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-uppercase text-sm fw-bold form-label">Password</label>
                                    <input type="password" placeholder="Password" name="password" class="form-control">
                                </div>
                                <button class="btn btn-primary btn-block w-100" name="login" type="submit">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>