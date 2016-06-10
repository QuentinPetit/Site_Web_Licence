
<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil </title>
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
	
	
	if (isset($_POST['submit']) &&
		isset($_POST['nomParcours']) &&
		isset($_POST['description']) &&
		isset($_POST['objectifs']) &&
		isset($_POST['competences']) &&
		isset($_POST['logiciels']) &&
		isset($_POST['dossier']) &&
		isset($_POST['admission'])) 
	{
		if ($_POST['nomParcours']!="" &&
			$_POST['description']!="" &&
			$_POST['objectifs']!="" &&
			$_POST['competences']!="" &&
			$_POST['logiciels']!="" &&
			$_POST['admission']!="" &&
			$_POST['dossier']!="") 
		{
			$nomParcours = $_POST['nomParcours'];
			$description = $_POST['description'];
			$objectifs=$_POST['objectifs'];
			$competences=$_POST['competences'];
			$logiciels=$_POST['logiciels'];
			$admission=$_POST['admission'];
			$dossier=$_POST['dossier'];

			$uploadOk = 1;
			$sql="SELECT * FROM parcours WHERE ID_parcours=".$_GET['parcoursID'].";";
			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			$array = explode("/", utf8_encode($row['Plaquette']));
			$oldPlaquette = end($array);
			$array = explode("/", utf8_encode($row['Mascotte']));
			$oldMascotte = end($array);
			$array = explode("/", utf8_encode($row['Fond']));
			$oldFond = end($array);
	

			$target_dirBackground = "../Images/backgroundParcours/";
			$target_dirMascotte = "../Images/Mascottes/";
			$target_dirPlaquette = "../Plaquettes/";
			if (isset($_FILES['fond'])) {
				$target_fileBackground=$target_dirBackground.basename($_FILES["fond"]["name"]);
				$backgroundFileType = pathinfo($target_fileBackground, PATHINFO_EXTENSION);
				if($backgroundFileType != "jpg" && $backgroundFileType != "png" && $backgroundFileType != "jpeg"
				&& $backgroundFileType != "gif" ) {
					$error="Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés pour les images de fond.";
					$uploadOk = 0;
				}
				if (file_exists($target_fileBackground)) {
					$error = "Cette image de fond existe déjà";
					$uploadOk = 0;
				}
			}
			if (isset($_FILES["mascotte"])) {
				$target_fileMascotte=$target_dirMascotte.basename($_FILES["mascotte"]["name"]);
				$mascotFileType = pathinfo($target_fileMascotte, PATHINFO_EXTENSION);
				if($mascotFileType != "jpg" && $mascotFileType != "png" && $mascotFileType != "jpeg"
				&& $mascotFileType != "gif" ) {
					$error="Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés pour les mascottes.";
					$uploadOk = 0;
				}
				if (file_exists($target_fileMascotte)) {
					$error = "Cette mascotte existe déjà";
					$uploadOk = 0;
				}
			}
			if (isset($_FILES["plaquette"])) {
				$target_filePlaquette=$target_dirPlaquette.basename($_FILES["plaquette"]["name"]);
				$plaquetteFileType = pathinfo($target_filePlaquette, PATHINFO_EXTENSION);
				if($plaquetteFileType != "pdf" ) {
					$error="Désolé, seuls les fichiers PDF sont autorisés pour les plaquettes.";
					$uploadOk = 0;
				}
				if (file_exists($target_filePlaquette)) {
					$error = "Cette plaquette existe déjà";
					$uploadOk = 0;
				}
			}
			if (isset($_FILES['fond'])) {
				$filefond=$_FILES["fond"]["name"];
				move_uploaded_file($_FILES['fond']['tmp_name'], $target_fileBackground);
			} else {
				$filefond = $oldFond;
			}
			if (isset($_FILES["mascotte"])) {
				$filemascotte = $_FILES["mascotte"]["name"];
				move_uploaded_file($_FILES['mascotte']['tmp_name'], $target_fileMascotte);
			} else {
				$filemascotte = $oldMascotte;
			}
			if (isset($_FILES["plaquette"])) {
				$fileplaquette = $_FILES["plaquette"]["name"];
				move_uploaded_file($_FILES['plaquette']['tmp_name'], $target_filePlaquette);
			} else {
				$fileplaquette = $oldPlaquette;
			}

			$sql = "UPDATE parcours SET Nom='".utf8_decode($nomParcours)."', Objectifs='".utf8_decode($objectifs)."', Description='".utf8_decode($description)."', Competences='".utf8_decode($competences)."', Logiciels='".utf8_decode($logiciels)."', Plaquette='./Plaquettes/".$fileplaquette."', Mascotte='./Images/Mascottes/".$filemascotte."', Fond='./Images/backgroundParcours/".$filefond."' WHERE ID_parcours=".$_GET['parcoursID'].";";
			if ($conn->query($sql) === TRUE) {
				$message = "Le parcours a bien été modifié";
			} else {
				$error="Une erreur s'est produite. Veuillez réessayer ultérieurement.";
			}
		}
	}
	?>
	<div class="container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="modifParcours.php?parcoursID=<?php echo $_GET['parcoursID'] ?>" method="POST">
				<?php
					if (isset($error)) {
						echo "<div class='alert alert-danger'>".$error."</div>"; 
					}
					if (isset($message)) {
						echo "<div class='alert alert-success'>".$message."</div>";
					}
				?>
				<?php 
					if (isset($_GET['parcoursID'])) { 
						$sql="SELECT * FROM parcours WHERE ID_parcours=".$_GET['parcoursID'].";";
						$result = $conn->query($sql);
						$row=$result->fetch_assoc();
						?>
						<div class="form-group">
							<label>Nom du parcours</label>
							<textarea class="form-control" placeholder="Nom" maxlength="40" name="nomParcours" rows="1"><?php echo utf8_encode($row['Nom']); ?></textarea>
						</div>
						<div class="form-group">
							<label>Nom du dossier</label>
							<textarea class="form-control" placeholder="Dossier du parcours." name="dossier" maxlength="10" rows="1"><?php echo utf8_encode($row['Dossier']); ?></textarea>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" placeholder="Description du parcours." name="description" rows="5"><?php echo utf8_encode($row['Description']); ?></textarea>
						</div>
						<div class="form-group">
							<label>Objectifs</label>
							<textarea class="form-control" placeholder="Objectifs du parcours." name="objectifs" rows="5"><?php echo utf8_encode($row['Objectifs']); ?></textarea>
						</div>
						<div class="form-group">
							<label>Compétences</label>
							<textarea class="form-control" placeholder="Compétences visées" name="competences" rows="5"><?php echo utf8_encode($row['Competences']); ?></textarea>
						</div>
						<div class="form-group">
							<label>Logiciels</label>
							<textarea class="form-control" placeholder="Logiciels utilisés" name="logiciels" rows="5"><?php echo utf8_encode($row['Logiciels']); ?></textarea>
						</div>
						<div class="form-group">
							<label>Admission</label>
							<textarea class="form-control" placeholder="Conditions d'admission au parcours." name="admission" rows="5"><?php echo utf8_encode($row['Admission']); ?></textarea>
						</div>
						<div class="form-group">
							<label>Plaquette</label>
							</br>
							<label>
								<?php 
									$array = explode("/", utf8_encode($row['Plaquette']));
									$oldPlaquette = end($array);
									echo $oldPlaquette;
								?>
							</label>
							<input type="file" class="form-control" name="plaquette"></input>
						</div>
						<div class="form-group">
							<label>Mascotte</label>
							</br>
							<label>
								<?php
									$array = explode("/", utf8_encode($row['Mascotte']));
									$oldMascotte = end($array);
									echo $oldMascotte;
								?>
							</label>
							<input type="file" class="form-control" name="mascotte"></input>
						</div>
						<div class="form-group">
							<label>Image de fond</label>
							</br>
							<label>
								<?php
									$array = explode("/", utf8_encode($row['Fond']));
									$oldFond = end($array);
									echo $oldFond;
								?>
							</label>
							<input type="file" class="form-control" name="fond"></input>
						</div>
						<button type="submit" class="btn btn-primary" name="submit">Modifier</button>
				<?php	
					}
				?>
			</form>
		</div>
	</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>