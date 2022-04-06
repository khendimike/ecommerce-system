<?php
session_start();
error_reporting(0);
include('includes/db_connection.php');
if(strlen($_SESSION['alogin'])==0){
    header('location:index.php');
} else {
if(isset($_REQUEST['eid'])) {
    $eid=intval($_GET['eid']);
    $status="2";
    $sql = "UPDATE orders SET email='$status' WHERE  id='$eid'";
    $query = mysqli_query($con, $sql);

    $msg="Booking Successfully Cancelled";
}


if(isset($_REQUEST['aeid'])) {
    $aeid=intval($_GET['aeid']);
    $status=1;
    $sql = "UPDATE tblbooking SET Status='$status' WHERE  id='$aeid'";
    $query = mysqli_query($con, $sql);

    $msg="Booking Successfully Confirmed";
}


?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <title>Admin Manage orders </title>

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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-dark">
            <?php include "includes/left_side_bar.php";?>
        </div>
        <div class="col-sm-8">
            <h2 class="page-title">Manage Bookings</h2>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
            <table  class="table table-striped table-bordered table-hover table-responsive-lg" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Order date</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Order date</th>
                </tr>
                </tfoot>
                <tbody>
                <?php
                $sql = "SELECT users.firstname,users.secondname,categories.cat_name,products.name,orders.orderDate,orders.productId as oid,orders.id  from orders join products on products.id = orders.productId join users on users.email = orders.user join categories on products.category = categories.id  ";
                $query = mysqli_query($con, $sql);
                $results=mysqli_fetch_all($query,MYSQLI_ASSOC);
                $cnt = 1;
                foreach($results as $result) {	?>
                    <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($result['firstname'].' '. $result['secondname']);?></td>
                        <td><a href="<?php echo htmlentities($result['oid']);?>"><?php echo htmlentities($result['cat_name']);?> , <?php echo htmlentities($result['name']);?></td>
                        <td><?php echo htmlentities($result['orderDate']);?></td>
                    </tr>
                    <?php $cnt=$cnt+1; }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>


