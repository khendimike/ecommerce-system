<?php
session_start();
error_reporting(0);
include('includes/db_connection.php');
if(strlen($_SESSION['alogin'])==0) {
    header('location:index.php');
} else {
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>

<?php include "includes/header.php";?>
<div class="container-fluid">
    <div class="row mt-1">
        <div class="col-sm-2 bg-dark left-bar">
           <?php include "includes/left_side_bar.php"?>
        </div>

        <div class="col-md-8 ms-4">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <h2 class="page-title">Dashboard</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row g-5">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body bg-primary text-center text-white">
                                                <?php
                                                $sql ="SELECT id from users ";
                                                $query = mysqli_query($con, $sql);
                                                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                                $regusers= mysqli_num_rows($query);
                                                ?>
                                                <div class="h1 "><?php echo htmlentities($regusers);?></div>
                                                <div class=" fs-5 text-uppercase">Reg Users</div>
                                            </div>
                                            <div class="card-footer text-center text-muted">
                                                <a href="manage-users.php" class="text-muted text-center">Full Detail <i class=" text-muted fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body bg-info text-center text-white">
                                                <?php
                                                $sql1 ="SELECT id from products ";
                                                $query1 = mysqli_query($con,$sql1);
                                                $results1= mysqli_fetch_all($query1,MYSQLI_ASSOC);
                                                $totalproducts= mysqli_num_rows($query1);
                                                ?>
                                                <div class="h1"><?php echo htmlentities($totalproducts);?></div>
                                                <div class="fs-5 text-uppercase">Listed products</div>
                                            </div>
                                            <div class="card-footer text-center ">
                                                <a href="manage-products.php" class="text-muted">Full Detail &nbsp; <i class=" text-muted fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body bg-primary text-center text-white">
                                                <?php
                                                $sql2 = "SELECT id from orders ";
                                                $query2 = mysqli_query($con, $sql2);
                                                $results2 = mysqli_fetch_all($query2,MYSQLI_ASSOC);
                                                $orders= mysqli_num_rows($query2);
                                                ?>
                                                <div class=" h1 "><?php echo htmlentities($orders);?></div>
                                                <div class="fs-5 text-uppercase">Total Orders</div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a href="manage-orders.php" class="text-muted">Full Detail &nbsp; <i class=" text-muted fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card ">
                                            <div class="card-body bg-warning text-center text-white">
                                                <?php
                                                $sql3 ="SELECT id from categories ";
                                                $query3= mysqli_query($con, $sql3);
                                                $results3 = mysqli_fetch_all($query3,MYSQLI_ASSOC);
                                                $categories= mysqli_num_rows($query3);
                                                ?>
                                                <div class="h1"><?php echo htmlentities($categories);?></div>
                                                <div class="fs-5 text-uppercase">product categories</div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a href="manage-categories.php" class="text-muted">Full Detail &nbsp; <i class=" text-muted fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <small>&copy; 2022</small>
</div>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>