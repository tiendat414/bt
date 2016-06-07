<?php
include 'conect.php';
include 'header.php';
$id=$_GET['id'];
$sql="DELETE FROM book WHERE id=?";
$db->Execute($sql, array($id));
?>
<label class="label label-success">Delete Book Success!</label>
<?php include 'foodter.php';?>
