<?php
session_start();
error_reporting(0);
include('includes/db_connection.php');
if(strlen($_SESSION['login'])== 0) {
    header('location:index.php');
} else {
    ?>
    <!DOCTYPE HTML>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Orders</title>
        <!--Bootstrap -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
        <link href="assets/css/custom.css" type="text/css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">


    </head>
    <body>

    <?php include('includes/header.php');?>


        <div class="container mt-5">
            <div class="row">
<!--                <div class="col-md-3 col-sm-3">-->
<!--                    --><?php //include('includes/sidebar.php');?>
<!--                </div>-->
                <div class="col-md-9 col-sm-8">
                    <h5 class="text-uppercase text-decoration-underline fw-bolder">My orders </h5>
                    <ul class="list-unstyled">
                        <?php
                        $useremail=$_SESSION['login'];
                        $sql = "SELECT products.P_image1 as Pimage1,products.name,products.price,products.id as pid,categories.cat_name,orders.orderDate from orders join products on orders.productId = products.id join categories on categories.id = products.category where orders.user='$useremail'";
                        $query = mysqli_query($con, $sql);
                        $results=mysqli_fetch_all($query, MYSQLI_ASSOC);
                        $cnt=1;
                        if(mysqli_num_rows($query)> 0) {
                            foreach($results as $result) { ?>
                                <li class="row">
                                    <div class="col-md-3">
                                        <a href="product-details.php?pid=<?php echo htmlentities($result['pid']);?>"">
                                            <img src="admin/images/<?php echo htmlentities($result['Pimage1']);?>" alt="image" width="150" height="100">
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <h6 class="text-dark">
                                            <a href="product-details.php?pid=<?php echo htmlentities($result['pid']);?>">
                                                <?php echo htmlentities($result['name']);?>
                                            </a>
                                        </h6>
                                        <p>
                                            <b>price</b>
                                            <?php echo htmlentities($result['price']);?><br />
                                        </p>
                                    </div>

                                </li>
                                <hr>
                            <?php } } ?>
                    </ul>
                </div>
            </div>
        </div>

    </section>

<!--    --><?php //include('includes/footer.php');?>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
    </html>
<?php } ?>
