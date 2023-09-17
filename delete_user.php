<?php
$delete_user=$_POST['delete_user'];
session_start();
require_once('connection.php');
	$uname = $_SESSION["u1"];
	$pwd = $_SESSION["pwd"];
	
	$sql="SELECT * FROM users where username='admin1' and password_hash=?;";
	$res = $conn->prepare($sql);
	$res->execute(array($pwd));
	$result = $res->fetch();
	if($result['username']=='')
	{
		
		die("you're not admin!");
	}
	else
	{
		try
		{
			$sql="DELETE from users WHERE username=?";
			$res = $conn->prepare($sql);
			$res->execute(array($delete_user));
			echo "user is deleted";
		}
		catch(PDOException $e) {
	 	 	echo "Error: " . $e->getMessage();
		}
	}

?>
