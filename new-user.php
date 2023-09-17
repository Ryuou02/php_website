<html>
<body>

<?php
require_once('connection.php');
$username = $_POST["uname"];
$password = $_POST["password"];
$password_hash = md5($password);
$dob = $_POST["dob"];

try{
	$sql="SELECT * FROM users where username=?";
	$res = $conn->prepare($sql);
	$res->execute(array($username));
	$rcount = $res->fetch();

	if($rcount['username']=='')
	{	
	
		  $sql = "INSERT INTO users (username,password_hash,dob) VALUES (?, ?,?);";
		  $result = $conn->prepare($sql);
		  $result->execute(array($username,$password_hash,$dob));
		  echo "username and password is registered!<br>";
	
	}
	else
	{
		die("it looks like someone else already took that username, please use a different username");	
	}
} catch(PDOException $e) 
	{
	  echo "<br>there was an error";
	}

$conn = null;

?>
click <a href="index.php">here</a> to go back to login
</body>
</html>
