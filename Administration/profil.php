<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Mon Profile</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../Ressources/BootstrapCustom/css/bootstrap.min.css">
	<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
	<link type="text/css" rel="stylesheet" href="../CSS/customNavbar.css">
	<link type="text/css" rel="stylesheet" href="../CSS/style.css">		
</head>
<header>
	<?php include('../PHP/headerAdmin.php') ?>
	<?php include('../PHP/navbarAdmin.php') ?>
</header>
<body>
	<?php include('../PHP/connexion.php'); ?>

		<?php 
		$sql = "SELECT * FROM ".$user_table." WHERE ID_".$user_table." = '".$user_ID."'";
		$result = $conn->query($sql);
		$row=$result->fetch_assoc();

		if (isset($_POST['submit']) &&
			isset($_POST['oldpassword']) &&
			isset($_POST['confirmoldpassword']) &&
			isset($_POST['password']) &&
			isset($_POST['confirmpassword'])) {
			
			if ($_POST['password']!="" || $_POST['oldpassword']!="" || $_POST['confirmoldpassword']!="" || $_POST['confirmpassword']) {
				if ($_POST['confirmoldpassword']==$_POST['oldpassword'] &&  $_POST['oldpassword']!="" && $_POST['oldpassword']==$row['Password'])
				{
					if ($_POST['password']==$_POST['confirmpassword'] && $_POST['password']!="") {
						$sqlupdatepassword = "UPDATE ".$user_table." SET Password='".utf8_decode($_POST['password'])."' WHERE ID_".$user_table." = '".$user_ID."';";
						$conn->query($sqlupdatepassword);
						$messagepassword = "Votre mot de passe a été mis a jour";
					} else {
						$errorpassword = "Votre mot de passe est différent de votre mot de passe de confirmation";
					}
				} else {
					$errorpassword = "Votre ancien mot de passe est différent de votre ancien mot de passe de confirmation ou de votre mot de passe actuel";
				}
			}
		}



		if(isset($_POST['onlinecv'])){
			if ($_POST['onlinecv']!="") {
				$sqlupdateonlinecv = "UPDATE eleves SET CV_en_Ligne='".utf8_decode($_POST['onlinecv'])."' WHERE ID_eleves='".$user_ID."';";
				$conn->query($sqlupdateonlinecv);
				$messageonlinecv = "Le lien vers votre CV en ligne a bien été mis a jour";
			}
		}

		if (isset($_FILES['cvfile'])) {
			if($_FILES['cvfile']['name']!=""){
				$target_dirCV = "../Etudiants/".$row['Nom']."_".$row['Prenom']."_".$row['UserName']."/";
				$target_fileCV=$target_dirCV.basename($_FILES["cvfile"]["name"]);
				$CVFileType = pathinfo($target_fileCV, PATHINFO_EXTENSION);
				if($CVFileType != "pdf" ) {
					$errorcvfile="Désolé, seuls les fichiers PDF sont autorisés pour les CVs.";
					$uploadOk = 0;
				} else {
					if ($row['CV_PDF']!=""){
						unlink($row['CV_PDF']);
					} 
					move_uploaded_file($_FILES['cvfile']['tmp_name'], $target_fileCV);
					$sqlupdatecvfile = "UPDATE eleves SET CV_PDF=".$target_fileCV." WHERE ID_eleves='".$user_ID."';";
					$conn->query($sqlupdatecvfile);
					$messagecvfile = "Votre CV a été mis en ligne";
				}
			} 
		}
		if (isset($_POST['visibility'])) {
			if ($user_statut == "etudiant") {
				$sql = "SELECT * FROM ".$user_table." WHERE ID_".$user_table." = '".$user_ID."'";
				$result = $conn->query($sql);
				$row=$result->fetch_assoc();
				
				if ($row['CV_en_Ligne']!="") {
					$sqlupdatevisibility = "UPDATE eleves SET CV_visibility=".$_POST['visibility']." WHERE ID_eleves='".$user_ID."';";
					$conn->query($sqlupdatevisibility);
				}			
			}
		}
		


		 ?>
					
		<div class="container-fluid">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<form id="profile-form" action="" method="POST" enctype="multipart/form-data">
					<?php
					if (isset($messagepassword)) {
						echo "<div class='alert alert-success'>".$messagepassword."</div>"; 
					}
					if (isset($errorpassword)) {
						echo "<div class='alert alert-danger'>".$errorpassword."</div>";
					}
					if (isset($messageonlinecv)) {
						echo "<div class='alert alert-success'>".$messageonlinecv."</div>";
					}
					if (isset($errorcvfile)) {
						echo "<div class='alert alert-danger'>".$errorcvfile."</div>";
					}
					if (isset($messagecvfile)) {
						echo "<div class='alert alert-success'>".$messagecvfile."</div>";
					}
					?>
					<div class="form-group">
						<label>Ancien mot de passe</label>
						<input class="form-control" type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="Old Password" maxlength="10">
					</div>
					<div class="form-group">
						<label>Confirmation de l'ancien mot de passe</label>
						<input class="form-control" type="password" name="confirmoldpassword" id="confirmoldpassword" class="form-control" placeholder="Old Password" maxlength="10">
					</div>
					<div class="form-group">
						<label>Nouveau mot de passe</label>
						<input class="form-control" type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="10">
					</div>
					<div class="form-group">
						<label>Confirmation du nouveau mot de passe</label>
						<input class="form-control" type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" maxlength="10">
					</div>
					<?php 
						if ($user_statut == "etudiant") {
						?>	
							<div class="form-group">
								<label>CV</label>
								<input class="form-control" type="file" name="cvfile"></input>
							</div>
							<div class="form-group">
								<label>Lien du CV/Portfolio en ligne</label>
								<textarea class="form-control" name="onlinecv" rows="1"></textarea>
							</div>
							<div class="row">
								<label>Rendre mon CV en ligne visible?</label>
								<label class="radio-inline"><input type="radio" name="visibility" value="0">Non</label>
								<label class="radio-inline"><input type="radio" name="visibility" checked="true" value="1">Oui</label>
							</div>
							
						<?php
						}
					 ?>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<input type="submit" name="submit" class="form-control btn btn-primary" value="Modifier">
							</div>
						</div>
					</div>
				</form>	
			</div>
			
		</div>

	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>