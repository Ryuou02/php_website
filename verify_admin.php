<?php
include('connection.php');
session_start();
if(isset($_SESSION["u1"]) && isset($_SESSION["pwd"])){
$u1 = $_SESSION["u1"];
$pwd = $_SESSION["pwd"];
$sql="SELECT * FROM users where username='".$u1."' and password_hash='".$pwd."';";
	$res = $conn->prepare($sql);
	$res->execute();
	$rnum = $res->fetch();
	if($rnum['username']==''){
		die("error in authentication!\n are you sure you're admin?")
	}
}
else{
	echo "for";
}
?>

