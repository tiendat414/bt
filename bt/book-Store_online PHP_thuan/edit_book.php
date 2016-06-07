<?php
include 'conect.php';
include 'header.php';
$id=$_GET['id'];
$name=$_GET['name'];
$kind=$_GET['kind'];
$author=$_GET['author'];
$decri=$_GET['decription'];
$total=$_GET['total'];
$price=$_GET['price'];
$sql="UPDATE book SET Name_book=?,Kind=?,Author=?,Price=?,Decription=?,Total=? WHERE Id=? ";
$db->Execute($sql,array($name,$kind,$author,$price,$decri,$total,$id));
echo "Update Success!"
?>
<label class="btn btn-primary"><a style="color: white" href="addbook_display.php">Come Back</a></label>
