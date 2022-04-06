<?php
//error_reporting(0);
include('includes/db_connection.php');
if(isset($_POST['signup']))
{
    $fname=$_POST['firstname'];
    $sname=$_POST['secondname'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO  users(firstname,secondname,email,password) VALUES('$fname','$sname','$email','$password')";
    $insert = mysqli_query($con, $sql);


    if(isset($insert)) {
        echo "<script>alert('Registration successfull. Now you can login');</script>";
    }
    else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}

?>
<div class="modal fade" id="signupform">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Sign Up</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="signup_wrap">
                        <div class="col-md-12 col-sm-6">
                            <form  method="post" name="signup">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="secondname" placeholder="Second Name" required="required">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" id="email"  placeholder="Email Address" required="required">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-primary btn-block">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <p>Already got an account? <a href="#loginform" data-bs-toggle="modal" data-bs-dismiss="modal">Login Here</a></p>
            </div>
        </div>
    </div>
</div>