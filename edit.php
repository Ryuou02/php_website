<html>
<body>
<?php
session_start();
require_once('connection.php');

if(isset($_SESSION["u1"]) && isset($_SESSION["pwd"]))
{
	$uname = $_SESSION["u1"];
	$pwd = $_SESSION["pwd"];
}
else 
{
	echo "forbidden page!!";
}
try{
	$sql="SELECT * FROM users where username='admin1' and password_hash='".$pwd."';";
	$res = $conn->prepare($sql);
	$res->execute();
	$result = $res->fetch();

	if($result['username']=='')
	{
		
		die("you're not admin!");
	}
}
catch(PDOException $e) 
{
	echo $sql . "<br>" . $e->getMessage();
}
//echo "hello admin!";

$u1 = $_POST['username'];
$val = $_POST['val'];
$val_name = $_POST['val_name'];


try{
	$sql="SELECT * FROM users where username= ? ";
	$res = $conn->prepare($sql);
	$res->execute(array($uname));
	$rcount = $res->fetch();

	if($rcount['username']=='')
	{	
		echo "the user to change data for, doesn't exist";
	}
	else
	{
	
		  $sql = "UPDATE users SET ".$val_name." = ? where username = ?";
		  $result = $conn->prepare($sql);
		  $result->execute(array($val ,$u1));
		  echo "data successfully changed<br>";
	
	}
} 
catch(PDOException $e) 
{
	echo $sql . "<br>" . $e->getMessage();
}
$conn=null;
?>
</body>
</html>
