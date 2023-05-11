<?php
session_start();
$u1 = $_SESSION['u1'];


?>
<!DOCTYPE html>
<html>
<body>
<?php echo "<h1> hello ".$u1." upload your file here </h1>"; ?>
<form action="fileuploads.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="ac" id="ac">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

