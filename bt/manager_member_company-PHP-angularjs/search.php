<?php
$_POST = json_decode(file_get_contents('php://input'), true);
$data_search=$_POST['input'];
$divison=$_POST['divison'];
$manager=$_POST['manager'];
$user=$_POST['user'];
$status=$_POST['status'];
if(isset($data_search)){
	$sql_user="";
	$sql_manager="";
	$sql_status="";
	$sql_divison="";
	if($status!="--All--"){
		$sql_status="and(status='".$status."')";
	}
	if($divison!="--All--"){
		$sql_divison="and(divison='".$divison."')";
	}
	if($manager !="--All--"){
		$sql_manager="and(manager='".$manager."')";
	}
	if($user!="--All--"){
		$sql_user="and(user='".$user."')";
	}
	$sql_input="select * from member where (name like '%".$data_search."%' or code='".$data_search."')";
	$sql_query=$sql_input.$sql_divison.$sql_manager.$sql_status.$sql_user;
	
	$conn = mysqli_connect("localhost","root", "","tiendat_db");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	else {
		$data=array();
		$result=$conn->query($sql_query);
		if ($result->num_rows > 0) {
		    $no=1;
		    while($row = $result->fetch_assoc()) {	    	
		        $dt=array('No'=>$no,'Code'=>$row['code'],'Member'=>$row['name'],'Divison'=>$row['divison'],"BSEManager"=>$row['manager'],"Status"=>$row['status'],"User"=>$row['user']);
		        array_push($data, $dt);
		        $no+=1;
		    }
		    $chot=array('query'=>$sql_query,'dat'=>$data);
		}
		echo json_encode($chot);
	}
	$conn->close();
}

