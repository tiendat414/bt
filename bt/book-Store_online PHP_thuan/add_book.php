<?php
//$_POST = json_decode(file_get_contents('php://input'), true);
include 'conect.php';
$name=$_POST['name_book'];
$price=$_POST['price'];
$total=$_POST['total'];
$kind=$_POST['kind'];
$decription=$_POST['decription'];
$authors=$_POST['author'];
$date_book=$_POST['date_book'];
$id=$_POST['id'];
$sql_query="INSERT INTO book (Id,Name_book,Kind,Author,Price,Decription,Date_,Total)VALUES(?,?,?,?,?,?,?,?)";
$db->Execute($sql_query,array($id,$name,$kind,$authors,$price,$decription,$date_book,$total));
echo $sql_query;
