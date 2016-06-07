<?php
$_POST = json_decode(file_get_contents('php://input'), true);
$id=(int)$_POST['code'];
$name=$_POST['name'];
$username=$_POST['username'];
$manager=$_POST['manager'];
$email=$_POST['email'];
$divison=$_POST['divison'];
$birthday=$_POST['birthday'];
$startwork=$_POST['startwork'];
$status=$_POST['status'];
$address=$_POST['address'];
//echo $id."-".$name."-".$username."-".$manager."-".$divison."-".$birthday."-".$startwork."-".$status;
$conn = mysqli_connect("localhost","root", "","tiendat_db");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
//	code,name,username,email,birthday,divison,startwork,manager,status
	$sql_query="update member set name=?,username=?,email=?,birthday=?,divison=?,startwork=?,manager=?,status=? ,address=? where code=?";
	$state=$conn->prepare($sql_query);
	$state->bind_param('sssssssssi',$name,$username,$email,$birthday,$divison,$startwork,$manager,$status,$address,$id);
	$result=$state->execute();
	if ($result==1){
		echo "update succes";
	}
	else echo "update faile";
}
$conn->close();