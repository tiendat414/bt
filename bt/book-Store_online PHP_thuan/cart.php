<?php
$key = $_GET['id'];
(int) $total = $_GET['total'];
session_start();
if ($_SESSION['cart'][$key] != "") {
    $old_total = (int) $_SESSION['cart'][$key];
    $new_total = $total + $old_total;
    $_SESSION['cart'][$key] = $new_total;
} else {
    $_SESSION['cart'][$key] = $total;
}
?>   


