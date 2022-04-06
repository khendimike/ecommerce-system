<?php
session_start();
error_reporting(0);
include('includes/db_connection.php');
if(strlen($_SESSION['alogin'])==0) {
    header('location:index.php');
} else {
    if(isset($_GET['del'])) {
        $id=$_GET['del'];
        $sql = "delete from categories  WHERE id='$id'";
        $query = mysqli_query($con, $sql);
        $msg="Category name Deleted successfully";
    }
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Admin Manage Categories   </title>
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
                <h2>Manage Categories</h2>
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <table  class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Brand Name</th>
                        <th>Creation Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Brand Name</th>
                        <th>Creation Date</th>
                        <th>Action</th>
                    </tr>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $sql = "SELECT * from  categories ";
                    $query = mysqli_query($con, $sql);
                    $results= mysqli_fetch_all($query,MYSQLI_ASSOC);
                    $cnt=1;
                    if(mysqli_num_rows($query) > 0) {
                        foreach($results as $result) {	?>

                            <tr>
                                <td><?php echo htmlentities($cnt);?></td>
                                <td><?php echo htmlentities($result['cat_name']);?></td>
                                <td><?php echo htmlentities($result['creation_date']);?></td>
                                <td>
                                    <a href="edit-category.php?id=<?php echo $result['id'];?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                    <a href="manage-categories.php?del=<?php echo $result['id'];?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close text-danger"></i></a>
                                </td>
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
<?php }?>
