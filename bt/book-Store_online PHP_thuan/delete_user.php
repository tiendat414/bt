<?php
include 'conect.php';
include 'header.php';
$id=$_GET['id'];
$sql="DELETE FROM member WHERE id=?";
$bl=$db->Execute($sql,array($id));
echo "Delete Member Success!"
?>

