<?php
session_start();
include('includes/db_connection.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home </title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/custom.css" type="text/css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>



<?php include('includes/header.php');?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">

        </div>
    </div>
    <div class="row g-0 mx-auto bg-white">
        <?php $sql = "SELECT products.name,categories.cat_name,products.price,products.id,products.description,products.P_image1 from products join categories on categories.id=products.category";
        $query = mysqli_query($con,$sql);
        $results = mysqli_fetch_all($query,MYSQLI_ASSOC);
        $cnt=1;
        if(mysqli_num_rows($query) > 0) {
            foreach($results as $result) {
                ?>

                <div class="col-sm-2">
                    <div class="card p-2">
                        <a href="product-details.php?pid=<?php echo htmlentities($result['id']);?>">
                            <img src="admin/images/<?php echo htmlentities($result['P_image1']);?>" class="w-100 card-img-top" alt="image">
                        </a>
                        <div class="card-body">
                            <div>
                                <h5 class="card-title ">
<!--                                    --><?php //echo htmlentities($result['cat_name']);?><!-- <br>-->
                                    <?php echo htmlentities($result['name']);?>
                                </h5>
                                <div class=" card-text fw-bold price text-warning">Ksh <?php echo htmlentities($result['price']);?></div>
                            </div>
                            <br>

                        </div>
                    </div>
                </div>
            <?php }}?>
    </div>
</div>



<?php include('includes/footer.php');?>

<!--Back to top-->
<!--<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>-->

<?php include('includes/login.php');?>
<?php include('includes/user_registration.php');?>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
