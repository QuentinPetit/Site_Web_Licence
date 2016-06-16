
<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajout de promotion</title>
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
			isset($_POST['anneeScolaireSelect'])) {
			$anneeScolaireSelect = $_POST['anneeScolaireSelect'];

			$target_dir = "../Images/Promotion/";
			$target_file = $target_dir . basename($_FILES["promotionPicture"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$array = explode(".", $_FILES["promotionPicture"]["name"]);
		    $fileName = $array[0];
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["promotionPicture"]["tmp_name"]);
			    if($check !== false) {
			        $message="Le fichier " . $check["mime"] . " est une image.";
			        $uploadOk = 1;
			    } else {
			        $error="Le fichier est une image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    $error="Désolé, le fichier existe déjà.";
			    $uploadOk = 0;
			}
			
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    $error="Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    $errorUpload="Désolé, votre fichier n'a pas été mis en ligne.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["promotionPicture"]["tmp_name"], $target_file)) {
			        $sql="INSERT INTO promotions (Lien, ID_Annee) VALUES ('./Images/Promotion/".$_FILES["promotionPicture"]["name"]."','".$anneeScolaireSelect."');";
			        if($conn->query($sql) === TRUE){
			  			$message="La promotion a bien été rajoutée.";
			  		} else {
			  			$error="Une erreur s'est produite. Veuillez réessayer ultérieurement.";
			  		}
			    } else {
			        $error="Désolé, une erreur est survenue lors de la mise en ligne de votre fichier";
			    }
			}

		}
	?>
		<div class="container-fluid">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<form action="ajoutPromotion.php" method="POST" enctype="multipart/form-data">
					<h1>Ajouter une promotion</h1>
					<?php
					if (isset($error))
					{
						echo "<div class='alert alert-danger'>".$error."</div>"; 
					}
					if (isset($errorUpload))
					{
						echo "<div class='alert alert-danger'>".$errorUpload."</div>"; 
					}
					if (isset($message)) 
					{
						echo "<div class='alert alert-success'>".$message."</div>";
					}
					?>
					<div class="form-group">
						<label>Photo de la promotion</label>
						<input type="file" class="form-control" name="promotionPicture">
					</div>
					<div class="form-group">
						<label>Choix de l'année scolaire</label>
						<select class="form-control" name="anneeScolaireSelect">
						<option disabled="true">Année Scolaire</option>
						<?php 
							$sql = "SELECT * FROM anneescolaire ORDER BY DateFin DESC";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$EndYears = date("Y", strtotime($row["DateFin"]));
									$StartYears = date("Y", strtotime($row["DateDebut"]));
									echo "<option value=".$row["ID_Annee"].">".$StartYears."-".$EndYears."</option>";
								}
							}
						?>
						</select>
						<button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
					</div>
					
				</form>
			</div>
		</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>