
<?php
session_start();
include('includes/db_connection.php');
error_reporting(0);
if(isset($_POST['order'])) {
    $useremail=$_SESSION['login'];
    $pid=$_GET['pid'];
    $sql="INSERT INTO  orders(user,productId) VALUES('$useremail','$pid')";
    $query = mysqli_query($con, $sql);

    $lastInsertId = mysqli_insert_id($con);
    if($lastInsertId) {
        echo "<script>alert('Order successfull.');</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Product Details</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/custom.css" type="text/css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>


<?php include('includes/header.php');?>


    <div class="container mt-3">
        <?php
        $pid=intval($_GET['pid']);
        $sql = "SELECT products.*,categories.cat_name,categories.id as cid  from products join categories on categories.id = products.category where products.id='$pid'";
        $query = mysqli_query($con, $sql);
        $results= mysqli_fetch_all($query, MYSQLI_ASSOC);
        $cnt=1;
        if(mysqli_num_rows($query) > 0) {
        foreach($results as $result) {
        $_SESSION['catid']=$result['cid'];
        ?>
        <div class="row">
            <div class="col-md-6">
                <div id="listingSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#listingSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#listingSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#listingSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#listingSlider" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#listingSlider" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="admin/images/<?php echo htmlentities($result['P_image1']);?>" width="100%" height="450" alt="image">
                        </div>
                        <div class="carousel-item">
                            <img src="admin/images/<?php echo htmlentities($result['P_image2']);?>" width="100%" height="450" alt="image" >
                        </div>
                        <div class="carousel-item">
                            <img src="admin/images/<?php echo htmlentities($result['P_image3']);?>" width="100%" height="450" alt="image" >
                        </div>
                        <div class="carousel-item">
                            <img src="admin/images/<?php echo htmlentities($result['P_image4']);?>" width="100%" height="450" alt="image" >
                        </div>
                        <div class="carousel-item">
                            <img src="admin/images/<?php echo htmlentities($result['P_image5']);?>" width="100%" height="450" alt="image" >
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#listingSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#listingSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <?php echo htmlentities($result['description']);?>
                </div>

            </div>
     </div>


<?php }} ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 ">
            <form method="post">
                <?php if($_SESSION['login'])
                {?>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-warning w-100"  name="order" value="Add to cart" ></input>
                    </div>
                <?php } else { ?>
                    <a href="#loginform" class="btn btn-primary btn-xs w-100" data-bs-toggle="modal" data-bs-dismiss="modal">Login to Buy</a>

                <?php } ?>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if($result['P_image5']==""){

            } else {
                ?>
                <div class="mt-5">
                    <img src="admin/images/<?php echo htmlentities($result['P_image1']);?>" class="" alt="image" width="210" height="200">
                    <img src="admin/images/<?php echo htmlentities($result['P_image2']);?>" class="" alt="image" width="210" height="200">
                    <img src="admin/images/<?php echo htmlentities($result['P_image3']);?>" class="" alt="image" width="210" height="200">
                    <img src="admin/images/<?php echo htmlentities($result['P_image4']);?>" class="" alt="image" width="210" height="200">
                    <img src="admin/images/<?php echo htmlentities($result['P_image5']);?>" class="" alt="image" width="210" height="200">

                </div>
            <?php } ?>
        </div>
    </div>
</div>


<!--Footer -->
<?php include('includes/footer.php');?>

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->

<?php include('includes/login.php');?>
<?php include('includes/user_registration.php');?>


<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>