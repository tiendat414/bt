<?php
$_POST = json_decode(file_get_contents('php://input'), true);
//$send=$_POST['input'];
$id=(int)$_POST['id'];
$sql_query="select * from member where code=?";
$name='';
$username="";
$email="";
$manager="";
$divison="";
$startwork="";
$status="";
$birthday="";

$conn = mysqli_connect("localhost","root", "","tiendat_db");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
		$state=$conn->prepare($sql_query);
		$state->bind_param('i',$id);
		$state->execute();
		$data=$state->get_result();
		while ($row = $data->fetch_assoc()) {
		    $name=$row['name'];
			$username=$row['username'];
			$email=$row['email'];
			$startwork=$row['startwork'];
			$manager=$row['manager'];
			$status=$row['status'];
			$divison=$row['divison'];
			$birthday=$row['birthday'];
			$address=$row['address'];
	}
	$result='{"code":"'.$id.'","birthday":"'.$birthday.'","name":"'.$name.'","manager":"'.$manager.'","username":"'.$username.'","divison":"'.$divison.'","email":"'.$email.'","start":"'.$startwork.'","status":"'.$status.'","addr":"'.$address.'"}';
	echo $result;
}
$conn->close();
