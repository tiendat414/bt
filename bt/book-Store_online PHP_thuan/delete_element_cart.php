<?php
include 'header.php';
session_start();
$id=$_GET['id'];
unset($_SESSION['cart'][$id]);
?>
<div class="container">
    <h3>Delete book from Cart Success !</h3>
    <a class="btn btn-primary" href="view_cart.php">Come Back</a>
</div>
<?php include 'foodter.php';?>