<?php
session_start();
error_reporting(0);
include('includes/db_connection.php');
if(strlen($_SESSION['alogin'])==0) {
    header('location:index.php');
} else {
    if(isset($_POST['submit'])) {
        $categoryname = $_POST['catname'];
        $sql="INSERT INTO  categories(cat_name) VALUES('$categoryname')";
        $query = mysqli_query($con, $sql);
        $lastInsertId = mysqli_insert_id($con);
        if($lastInsertId) {
            $msg="Category Created successfully";
        } else {
            $error="Something went wrong. Please try again";
        }

    }
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Admin Create Category</title>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            .succWrap{
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
        </style>
    </head>

    <body>

    <?php include('includes/header.php');?>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-md-2 bg-dark">
                <?php include "includes/left_side_bar.php";?>
            </div>
            <div class="col-md-8">
                <h2 class="page-title">Create Category</h2>
                <form method="post"  class="form-horizontal">
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <div class="mb-3 row">
                        <div class="col-md-2"></div>
                        <div class="col-sm-3">
                            <label class="form-label fw-bold">Category Name</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="catname" id="catname" required>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-5"></div>
                        <div class="col-sm-7">
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php } ?>
