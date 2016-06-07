<?php
$_POST = json_decode(file_get_contents('php://input'), true);
$code=(int)$_POST['code'];
$name=$_POST['name'];
$username=$_POST['username'];
$manager=$_POST['manager'];
$divison=$_POST['divison'];
$birthday=$_POST['birthday'];
$startwork=$_POST['startwork'];
$email=$_POST['email'];
$user=$_POST['user'];
$status="Active";
$address=$_POST['address'];
$sql_query="insert into member (code,name,username,email,birthday,divison,startwork,status,manager,user,address) value(?,?,?,?,?,?,?,?,?,?,?)";
$conn = mysqli_connect("localhost","root", "","tiendat_db");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$state=$conn->prepare($sql_query);
$state->bind_param("issssssssss",$code,$name,$username,$email,$birthday,$divison,$startwork,$status,$manager,$user,$address);
$result=$state->execute();
if($result==1){
	echo "Add member success ";
}
else echo "false";
$conn->close();