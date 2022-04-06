<nav class="navbar navbar-expand-lg navbar-dark bg-info ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>
            <span class="nav-item dropdown ">
                <a href="#" class="text-decoration-none nav-link text-white " data-bs-toggle="dropdown" ><i class="fa fa-user-circle-o me-1"></i>
                    <?php
                    $email=$_SESSION['login'];
                    $emailId = $_POST['email'];
                    $sql ="SELECT firstname FROM users WHERE email = '$emailId'";
                    $query = mysqli_query($con,$sql);
                    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);

                    foreach($results as $result) {
                        echo htmlentities($result['firstname']);
                    }
                    ?><i class="fa fa-angle-down hidden-side ps-2"></i></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if($_SESSION['login']) { ?>
                    <li class="dropdown-item"><a href="orders.php" class="text-decoration-none bg-warning text-center p-2 text-white">view cart</a></li>
                    <li class="dropdown-item"><a href="logout.php" class="text-decoration-none">Logout</a></li>
                    <?php } else { ?>
                        <li class="dropdown-item"><a href="#loginform" class="text-decoration-none"  data-bs-toggle="modal" data-bs-dismiss="modal">Register</a></li>
                        <li class="dropdown-item"><a href="#loginform" class="text-decoration-none"  data-bs-toggle="modal" data-bs-dismiss="modal">My Order</a></li>
                       <li class="dropdown-item"><a href="#loginform" class="text-decoration-none"  data-bs-toggle="modal" data-bs-dismiss="modal">Logout</a></li>
                    <?php } ?>
                </ul>

            </span>
                <a href="orders.php">
                    <span  class="fa fa-shopping-cart fs-5 text-white me-3"></span>
                </a>

            <?php if(strlen($_SESSION['login'])==0)	{ ?>

                <div class="login_btn">
                    <a href="#loginform" class="btn btn-primary px-2 py-1 text-uppercase" data-bs-toggle="modal" data-bs-dismiss="modal">Login / Register</a>
                </div>

                <?php
            } else{
                echo "Welcome";
            }
            ?>
        </div>
    </div>
</nav>
