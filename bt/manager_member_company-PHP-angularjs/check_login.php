<?php 
$_POST = json_decode(file_get_contents('php://input'), true);
$user = $_POST["tk"];
$pass = $_POST["pass"];
//$user="admin";
//$pass="12345";
// Create connection
$conn = mysqli_connect("localhost","root", "","tiendat_db");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$state=$conn->prepare("select * from admin_side where user=? and pass=?" );
$state->bind_param("ss",$user,$pass);
$state->execute();
$data=$state->get_result();
if ($row = $data->fetch_assoc()>0){
	echo "Login success";
}
else echo "login false";
$conn->close();


