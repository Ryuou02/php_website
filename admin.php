<html>
<title>
admin page
</title>
<body>

<table border=1>
<tr>
<th>
username
</th>
<th>
date of birth
</th>
<th>
uploaded file
</th>
</tr>
<?php
	session_start();
	require_once('connection.php');
	$uname = $_SESSION["u1"];
	$pwd = $_SESSION["pwd"];
	
	$sql="SELECT * FROM users where username='admin1' and password_hash='".$pwd."';";
	$res = $conn->prepare($sql);
	$res->execute();
	$result = $res->fetch();
	if($result['username']=='')
	{
		
		die("you're not admin!");
	}
	echo "hello admin!<br>";
	echo "these are the users on server --";
	try{
		$sql="SELECT * FROM users";
		$res = $conn->prepare($sql);
		$res->execute();
		while($result = $res->fetch())
		{
			
			echo "<tr><td>".$result['username']."</td>";
			echo "<td>".$result['dob']."</td>";
			echo "<td>".$result['filename']."</td></tr>";
		}
	}
	catch(PDOException $e) {
 	 	echo "Error: " . $e->getMessage();
	}
	echo "<br>delete user here <br><br>" ;
	echo "<form action='delete_user.php' method='POST'>
	name of user to delete:<input type='text' name='delete_user'>
	<input type='submit' value='submit'>
	</form>"; 
	echo"<br><br>change anybody's data here:<br>";
	echo "<form action='edit.php' method='POST'>
	
	username:<input type='text' name = 'username'><br>
	value name : <input type='text' name = 'val_name'><br>
	value : <input type = 'text' name = 'val'><br>
	<input type='submit' value='submit'>
	</form>"; 
		
?>
</table>
</body>
</html>
