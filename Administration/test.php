<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include('../PHP/connexion.php'); ?>
<?php 
if (isset($_POST['submit']) &&
	isset($_POST['text'])) {
	$uploadOK = 1;
	$text = $_POST['text'];
	$target_dir = "../Images";

	$target_file = $target_dir.basename(($_FILES["file"]["name"]));

	move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

	$sql="INSERT INTO test (filepath, filetext) VALUES ('./Images/".$_FILES["file"]["name"]."', '".$text."');";
	if ($conn->query($sql)===TRUE) {
		echo "pouet";
	} else {
		echo "poulet de merde!";
	}
}
 ?>
 <?php include('../PHP/deconnexion.php'); ?>
<form action="test.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"></input>
	<textarea name="text"></textarea>
	<button type="submit" name="submit">prout</button>	
</form>
</body>
</html>