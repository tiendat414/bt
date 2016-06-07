<?php
include 'conect.php';
$id= $_GET['id'];
$pass= $_GET['pass'];
$email= $_GET['email'];
$address=$_GET['address'];
$user= $_GET['user'];
$name= $_GET['name'];
$type=$_GET['type'];
$phone=$_GET['phone'];
$sql="UPDATE member SET Name_mem=?,User_name=?,pass=?,User_type=?,Email=?,Phone=?,Address=?  WHERE id=?";
$db->Execute($sql,array($name,$user,$pass,$type,$email,$phone,$address,$id));
echo "Update Info Member Success!"
?>
