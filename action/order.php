<?php

require_once '../db.php';

if(isset($_POST['order_btn'])){

    $email = $_POST['order_email'];
    $product_name = $_POST['order_product'];
    $city = $_POST['order_city'];
    $street = $_POST['order_street'];
    $phone = $_POST['order_contact'];
    $product = $_POST['order_product'];
    $date = date('Y/m/d');
    $time = date('H:i:s');

    $order_sql = "insert into checkout(email,product_name, city, street, contact, date, time) values('$email','$product_name','$city','$street','$phone','$date','$time')";
    $order_query = mysqli_query($connection, $order_sql);

    if($order_query){
        header("Location: ../index.php");
    }else{
        echo 'Something went wrong';
    }
}



?>