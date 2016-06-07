<?php
$conn = mysqli_connect("localhost","root", "","tiendat_db");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql_query="select name from divison";
$result=$conn->query($sql_query);
$data=array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($data,$row['name']);
    }
}
$length = count($data);
$json='{"result":[';
for ($i = 0; $i < $length; $i++) {	
	if ($i<$length-1){
		$json=$json.'{"value":"'.$data[$i].'"},';
	}
	else {
		$json=$json.'{"value":"'.$data[$i].'"}';
	}
}
echo $json."]}";
$conn->close();