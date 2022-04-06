<ul class="nav flex-column ">
    <li class="nav-item">
        <a href="dashboard.php" class="nav-link text-white"><i class="fa fa-dashboard"></i> Dashboard</a>
    </li>
    <li class="accordion accordion-flush nav-item " id="acc">
        <div class="accordion-item bg-dark">
            <h6 class="accordion-header">
                <a href="#acccbrand" type="button" class="nav-link text-white"  data-bs-toggle="collapse"><i class=" fa fa-files-o"></i> Categories <i class="float-end fa fa-angle-down"></i></a>
            </h6>

            <div id="acccbrand" class="accordion-collapse collapse " data-bs-parent="#acc">
                <div class="accordion-body ">
                    <a href="create-categories.php" class="text-white text-decoration-none">create category</a><br><br>
                    <a  href="manage-categories.php" class="text-white text-decoration-none">manage categories</a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item accordion accordion-flush" id="acc1">
        <div class="accordion-item bg-dark">
            <h6 class="accordion-header">
                <a href="#accvehicle"  type="button" class="nav-link text-white" data-bs-toggle="collapse"><i class="fa fa-sitemap"></i>Products<i class="float-end fa fa-angle-down"></i></a>

            </h6>
            <div id="accvehicle" class="accordion-collapse collapse" data-bs-parent="#acc1">
                <div class="accordion-body ">
                    <a href="add-products.php" class="text-white text-decoration-none">Add products</a><br><br>
                    <a href="manage-products.php" class="text-white text-decoration-none">Manage products</a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item accordion accordion-flush" id="accUsers">
        <div class="accordion-item bg-dark">
            <h6 class="acccordion-header">
                <a href="#accregusers" type="button" class="nav-link text-white" data-bs-toggle="collapse" ><i class="fa fa-users"></i> Users<i class="float-end fa fa-angle-down"></i></a>
            </h6>
            <div id="accregusers" class="accordion-collapse collapse" data-bs-parent="#accUsers">
                <div class="accordion-body">
                    <a href="manage-user.php" class="text-white text-decoration-none border-3">Manage Users</a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a href="manage-orders.php" class="nac-link text-white text-decoration-none">Manage Orders</a>
    </li>
</ul>
