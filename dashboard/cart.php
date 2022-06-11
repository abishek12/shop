<?php
require_once "include/header.php";
if(!empty($_SESSION['state'])){ ?>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php require_once "include/sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
               <?php require_once "include/navbar.php"; ?>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
                <!-- add to card function -->
<?php
if(isset($_POST['add_to_cart'])){
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];
    $username = $_SESSION['email'];

    if($product_quantity == 0){
        echo "Quantity cannot be less than 0";
    }else{
        $sql = "INSERT INTO cart(title, quantity, username, price) values('$product_id','$product_quantity', '$username', '$product_price')";
        $query = mysqli_query($connection, $sql);
        if($query){
            echo "Added to cart";
        }else{
            echo "Failed to added";
        }
    }
}
?>
                <?php
                    if(isset($_POST['cart_delete'])){
                        $id = $_POST['id'];
                        $query = mysqli_query($connection, "delete from cart where id='$id'");

                        if($query){
                           echo "<script>alert('Cart Item has been deleted')</script>";
                        }
                    }
                ?>

                <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                         $username = $_SESSION['email'];
                         $sql = "select * from cart where username='$username'";
                         $query = mysqli_query($connection, $sql);
                         $item = [];

                         while($row = mysqli_fetch_assoc($query)){
                             $i++;
                             $id = $row['id'];
                             $title = $row['title'];
                             $quantity = $row['quantity'];
                             array_push($item, $title . ", ");
                             
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td>
                            <form action="cart.php" method="post">
                                <input type="text" value='<?php echo $id; ?>' name="id" id="" hidden>
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete" name="cart_delete" id="">
                            </form>
                        </td>
                    </tr>

                    <?php
                         }
                         
                    ?>
                
                    
                </tbody>
            </table>
            <a href="../checkout.php?product=<?php foreach($item as $item){
                            print_r($item);
                         } ?>" class='btn btn-success float-end'>Checkout</a>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php require_once "include/footer.php"; ?>




<?php } else{ ?>
    <h3>You have no permission to access. <span><a href="../login.php">Login</a></span></h3>
<?php
}
?>