<?php require_once "include/header.php"; ?>
<?php require_once "include/nav.php"; ?>   

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

<!-- delete product cart -->

<div class="section mt-5">
    <div class="container">
        
<?php
if(isset($_POST['cart_delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM cart where id='$id'";
    $query = mysqli_query($connection, $sql);
    if($query){
        echo "Item has been removed";
    }else{
        echo "Something went wrong";
    }
}
?>

<div class="price-section">
    <?php 
         $username = $_SESSION['email'];
         $sql = "select * from cart where username='$username'";
         $query = mysqli_query($connection, $sql);

         while($row = mysqli_fetch_assoc($query)){
             $price = $row['price'];
             $quantity = $row['quantity'];
             $amount = $price * $quantity;
              ?>
<p class="float-end">
        Total Price : <span class="font-weight-bold">Rs. <?php echo $amount;  ?></span>
    </p>
             <?php
        }
        
    ?>
</div>
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

                         while($row = mysqli_fetch_assoc($query)){
                             $i++;
                             $id = $row['id'];
                             $title = $row['title'];
                             $quantity = $row['quantity'];

                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td>
                            <form action="add_to_cart.php" method="post">
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
            <input type="submit" class="btn btn-warning float-end" value="Update" name="" id="">
    </div>
</div>


<?php require_once "include/footer.php"; ?>
