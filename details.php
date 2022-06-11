<?php require_once "include/header.php" ?>
<?php require_once "include/nav.php" ?>

<?php 
if(isset($_GET['details'])){
    $d = $_GET['details'];

    $sql = "select * from product where slug='$d'";
    $query = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($query);

    $title = $row['title'];
    $category = $row['category'];
    $price = $row['price'];
    $content = $row['content'];
    $description = $row['description'];
    $image = $row['image'];
}
?>
<form action="dashboard/cart.php" method="post">
<div class="section mt-4">
    <div class="container">
        <h2>Product Details</h2>
        <hr>
        <div class="row">
            <div class="col-xl-6">
                <img src="assets/img/<?php echo $image ?>" alt="" width="100%" height="350">
            </div>
            <div class="col-lg-6">
                <h4 name="product_title"><?php echo $title; ?>
                <hr>
                <h6>Quantity</h6>
                <!-- hide this -->
                <input name="product_id" hidden value="<?php echo $_GET['details'] ?>">
                <!-- hide this -->
                <input type="number" name="product_price" hidden value="<?php echo $price; ?>" id="">
                <input type="number" name="product_quantity" min=0 class="form-control" value="0">
                <?php
                if(!empty($_SESSION['state'])){ ?>
                <input type="submit" name="add_to_cart" class="btn btn-md btn-primary mt-4" value="Add to Cart">
                <?php
                }else{ ?>
                <input type="submit" name="add_to_cart" class="btn btn-md btn-primary mt-4" value="Add to Cart" disabled>
                <?php
                }
                ?>
            </div>
        </div>
        <h4 class="mt-5 text-center">Description</h4>
        <hr>
        <p class="text-justify">
            <?php echo  $description; ?>
        </p>
    </div>
</div>
</form>

<?php require_once "include/footer.php" ?>
