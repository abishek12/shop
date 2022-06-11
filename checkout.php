<?php
require_once "include/header.php";
if(!empty($_SESSION['state'])){ 

require_once "include/nav.php"; 


if(isset($_GET['product'])){ 
    $product = $_GET['product'];
    ?>

<div class="container">
    <h2 class='my-4'>Proceed To Payment</h2>
    <form action="action/order.php" method='POST'>
                    <input type="hidden" value='<?php echo $product; ?>' name='order_product'>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="order_email" id="" class="form-control" value='<?php echo $_SESSION['email'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <select name="order_city" id="" class='form-control'>
                            <option value="kathmandu">Kathmandu</option>
                            <option value="lalitpur">Lalitpur</option>
                            <option value="bhaktapur">Bhaktapur</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="">Street</label>
                            <input type="text" name="order_street" id="" class='form-control'>
                        </div>
                        <div class="col-6">
                            <label for="">Contact Number</label>
                            <input type="text" name="order_contact" id="" class='form-control'>
                        </div>
                    </div>

                    <input type="submit" name="order_btn" id="" class='btn btn-primary mt-3' value='Complete'>
                </form>
</div>

<?php

}else{
    header('Location: add_to_cart.php');
}

 require_once "include/footer.php";

 } else{ ?>
    <h3>You have no permission to access. <span><a href="../login.php">Login</a></span></h3>
<?php
}
?>