<?php include('../PHP/connexion.php'); ?>
<?php
	session_start();

	$user_login = $_SESSION['login_user'];
	$user_statut = $_SESSION['statut'];
	$user_table = $_SESSION['userTable'];
	
	$sql = "SELECT * FROM ".$user_table." WHERE UserName = '".$user_login."'";
	$result=$conn->query($sql);
	$row = $result->fetch_assoc();

	$user_ID = $row["ID_".$user_table];

	if(!isset($_SESSION['login_user'])){
		header("location:login.php");
	}
?>
<?php include('../PHP/deconnexion.php'); ?>