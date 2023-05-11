
<?php
require_once('connection.php');
session_start();
$username = $_SESSION['u1'];

$pathinfo = pathinfo($_FILES["ac"]["name"]);

$base = $pathinfo["filename"];

$base = preg_replace("/[^\w-]/", "_", $base);

$filename = $base . "." . $pathinfo["extension"];

$destination = __DIR__ . "/uploads/" . $filename;



//  print_r($_FILES);
  if ( ! move_uploaded_file($_FILES["ac"]["tmp_name"], $destination)){
  	exit(" file not uploaded");
  }
echo "filename is ".$_FILES["ac"]["name"];
try{
  $sql = "update users set filename = ? where username = ? and password_hash = ?;";
  $result = $conn->prepare($sql);
  $result->execute(array($_FILES["ac"]["name"],$username,$_SESSION['pwd']));
 } catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

echo  "file was uploaded successfully!";

echo "you can go back to home page by clicking <a href='backend.php'>here</a>";

?>

