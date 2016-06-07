<?php
include 'conect.php';
include 'header.php';
$user_name=$_GET['name'];
$pass=$_GET['pass'];
$sql="SELECT User_name,User_type FROM member WHERE User_name=? AND Pass=?";
$result=$db->GetRow($sql,array($user_name,$pass));
if($result!=false){
    if($result['User_type']=="Addmin"){
        session_start();
        $_SESSION['manager']="ok";
        header('Location: manager.php');
    }
    else{
      session_start();
      $_SESSION['user']="ok";
      header('Location: home.php');  
    }
}
else echo "Login Fail" ;
?>

