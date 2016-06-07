<?php
$conn = mysqli_connect("localhost","root", "","tiendat_db");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
	$sql_query="SELECT code FROM member ORDER BY code DESC LIMIT 1";
	$result=$conn->query($sql_query);	
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$new=$row["code"]+1;
	        echo '{"code":"'.$new.'","divison":"D1","user":"Member"}';
	    }
	}	    
}	
$conn->close();
