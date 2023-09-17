<?php
include('connection.php');
session_start();

$u1 = $_POST['uname'];
$p1= $_POST['pwd'];

$u1 = str_replace( array( '\'', '"',',' , ';', '<', '>' ), ' ', $u1);

$_SESSION["u1"] = $u1;
$_SESSION["pwd"] = md5($p1);

$pwd = md5($p1);




//$sql = "select * from users;";
// use exec() because no results are returned
//$result = $conn->exec($sql);
//echo $result;


try{
	$sql="SELECT * FROM users where username=? and password_hash=?;";
	$res = $conn->prepare($sql);
	$res->execute(array($u1,$pwd));
	$result = $res->fetch();
	if($result['username']==''){
		die("it looks like you didn't register or your data doesn't exist in database, please register in the index page");
	}
	if($result['username']=='admin1'){
		die("click <a href='admin.php'>here</a> to go to the admin page");
	}
	if($result['filename']==''){
		echo "please upload a file to complete your registration <a href='fileform.php'>here</a>";
	}
	else{
		echo "<h1>welcome back,".$u1."</h1>";
		echo "your date of birth is".$result['dob'];
		echo "<br> file name is ".$result['filename'];
	}
}
catch(PDOException $e) {
  echo "Error";
}
?>
</body>
</html>
