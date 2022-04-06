<?php
if(isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $sql ="SELECT firstname,email,password FROM users WHERE email='$email' and password= '$password'";
    $query = mysqli_query($con,$sql);
    $results = mysqli_fetch_all($query,MYSQLI_ASSOC);

    if(mysqli_num_rows($query) > 0){
        $_SESSION['login']=$_POST['email'];
        $_SESSION['fname']=$results['firstname'];
        $currentpage=$_SERVER['REQUEST_URI'];
        echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
    } else{
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>

<div class="modal fade" id="loginform">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fw-bolder">Login</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="login_wrap">
                        <div class="col-md-12 col-sm-6">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email"  placeholder="Email address*">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password*">
                                </div>

                                <div class="col-md-6 w-100">
                                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-block text-center ">
                <p>
                    Don't have an account?
                    <a href="#signupform" data-bs-toggle="modal" data-bs-dismiss="modal">Signup Here</a>
                </p>

            </div>
        </div>
    </div>
</div>