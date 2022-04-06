<?php
session_start();
error_reporting(0);
include('includes/db_connection.php');
if(strlen($_SESSION['alogin'])==0) {
    header('location:index.php');
} else {

    if(isset($_POST['submit'])) {

        $productname = $_POST['pname'];
        $productdescription = $_POST['pdescription'];
        $productprice = $_POST['price'];
        $productcategory = $_POST['pcategory'];

        $pimage1=$_FILES["img1"]["name"];
        $pimage2=$_FILES["img2"]["name"];
        $pimage3=$_FILES["img3"]["name"];
        $pimage4=$_FILES["img4"]["name"];
        $pimage5=$_FILES["img5"]["name"];

        move_uploaded_file($_FILES["img1"]["tmp_name"],"images/".$_FILES["img1"]["name"]);
        move_uploaded_file($_FILES["img2"]["tmp_name"],"images/".$_FILES["img2"]["name"]);
        move_uploaded_file($_FILES["img3"]["tmp_name"],"images/".$_FILES["img3"]["name"]);
        move_uploaded_file($_FILES["img4"]["tmp_name"],"images/".$_FILES["img4"]["name"]);
        move_uploaded_file($_FILES["img5"]["tmp_name"],"images/".$_FILES["img5"]["name"]);

        $sql = "INSERT INTO products(name,description,price, category, P_image1,P_image2,P_image3,P_image4,P_image5) VALUES('$productname','$productdescription','$productprice','$productcategory','$pimage1','$pimage2','$pimage3','$pimage4','$pimage5')";
        $query = mysqli_query($con, $sql);
        $lastInsertId = mysqli_insert_id($con);

        if($lastInsertId) {
            $msg="Product added successfully";
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
        <title>Admin Add Product</title>
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
            <div class="col-md-8">
                <h2>Add product</h2>
                <hr>
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                <div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="col-md-2 form-label fw-bold">Product name<span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="pname" class="form-control" required>
                            </div>

                            <label class="col-sm-2 control-label fw-bold">Select category<span style="color:red">*</span></label>
                            <div class="col-sm-3">
                                <select class="form-select bg-info text-white" name="pcategory" required>
                                    <option value=""> Select </option>
                                    <?php
                                    $ret="select id,cat_name from categories";
                                    $query= mysqli_query($con, $ret);
                                    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                    if(mysqli_num_rows($query) > 0) {
                                        foreach($results as $result) {?>
                                            <option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['cat_name']);?></option>
                                        <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label fw-bold">Product description<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="pdescription" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label fw-bold">Price<span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <h4><b>Upload Images</b></h4>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                Image 1 <span style="color:red">*</span><br>
                                <input type="file" name="img1" required>
                            </div>
                            <div class="col-sm-4">
                                Image 2 <span style="color:red">*</span><br>
                                <input type="file" name="img2" required>
                            </div>
                            <div class="col-sm-4">
                                Image 3 <span style="color:red">*</span><br>
                                <input type="file" name="img3" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                Image 4 <span style="color:red">*</span><br>
                                <input type="file" name="img4" required><br>
                            </div>
                            <div class="col-sm-4">
                                Image 5 <br>
                                <input type="file" name="img5"><br>
                            </div>
                        </div>
                        <div class="mt-3 row mb-3">
                            <div class="col-sm-8 offset-1">
                                <button class="btn btn-outline-danger" type="reset">Cancel</button>
                                <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--    <div class="ts-main-content">-->
<!--<!--        -->--><?php ////include('includes/leftbar.php');?>
<!--        <div class="content-wrapper">-->
<!--            <div class="container-fluid">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <div class="ms-5">-->
<!--                            <h2 class="page-title">Post A Vehicle</h2>-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-12">-->
<!--                                    <h4 class="fw-bold">Basic Info</h4>-->
<!--                                   -->
<!---->
<!--                                    <div class="panel-body">-->
<!--                                        <form method="post" enctype="multipart/form-data">-->
<!--                                            -->
<!---->
<!--                                           -->
<!---->
<!---->
<!--                                    -->
<!---->
<!--                                    -->
<!--                                    -->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                                       -->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    </div>-->

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php } ?>