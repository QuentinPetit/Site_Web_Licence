
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

	<div class="container-fluid">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<form action="modifProjet.php?projetID=<?php echo $_GET['projetID'] ?>" method="POST" enctype="multipart/form-data">
				<?php
				if (isset($error)) {
					echo "<div class='alert alert-danger'>".$error."</div>"; 
				}
				if (isset($message)) {
					echo "<div class='alert alert-success'>".$message."</div>";
				}
				?>
				<?php 
				if(isset($_GET['projetID'])){
					$sql = "SELECT * FROM projets WHERE ID_projets = '".$_GET['projetID']."';";
					$result = $conn->query($sql);
					$row=$result->fetch_assoc();
				?>
				<h1>Modifier un projet</h1>
				<div class="form-group">
					<label>Non du projet</label>
					<textarea class="form-control" name="nomProjets" maxlength="50" placeholder="Nom du projet" rows="1"><?php echo utf8_encode($row['Nom']); ?></textarea>    
				</div>
				
				<?php
				}
				?>				
				
				

				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" placeholder="Description du projet (synopsis, context...)" rows="5" wrap="hard"><?php echo utf8_encode($row['Description']); ?></textarea>					
				</div>

				<div class="form-group">
					<label>Caractéristiques</label>
					<textarea class="form-control" name="caracteristiques" placeholder="Caractéristiques du projet : toute technique spécifiques au projet (lancer de rayon, shader, modélisation low-poly...)" rows="5" wrap="hard"><?php echo utf8_encode($row['Caracteristique']); ?></textarea>					
				</div>

				<div class="form-group">
					<label>Choix du parcours</label>
					<select class="form-control" name="parcoursSelect[]" multiple="true">
						<option disabled="true">Parcours</option>
						<?php 
						$sql = "SELECT * FROM parcours";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {

								echo"<option value=".$row["Dossier"].">".utf8_encode($row["Nom"])."</option>";

							}
						} else {
							echo "0 results";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Choix des participants</label>
					<select class="form-control" name="participantsSelect[]" multiple="true">
						<option disabled="true">Participants</option>
						<?php 
						$sqlEleves = "SELECT * FROM eleves ORDER BY ID_eleves DESC";
						$resultEleves = $conn->query($sqlEleves);
						$sqlElevesToProjet = "SELECT ID_eleves FROM elevestoprojet WHERE ID_projets=".$_GET['projetID'];
						$resultElevesToProjet = $conn->query($sqlElevesToProjet);
						$arrayIDs = array();
						if ($resultElevesToProjet->num_rows > 0) {
							while ($rowElevesToProjet = $resultElevesToProjet->fetch_assoc()) {
								array_push($arrayIDs, $rowElevesToProjet['ID_eleves']);
							}
						} else {
							echo "0 results";
						}
						if ($resultEleves->num_rows > 0) {
							while ($rowEleves = $resultEleves->fetch_assoc()) {
								$lastID;
								$init = false;
								foreach ($arrayIDs as $arrayID) {
									if ($init==false){
										if ($arrayID == $rowEleves["ID_eleves"]) {
											echo"<option value=".$rowEleves["ID_eleves"]." selected='true'>".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])." </option>";
										} else {
											echo"<option value=".$rowEleves["ID_eleves"].">".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])."</option>";
										}
										$init=true;
										$lastID=$rowEleves["ID_eleves"];
									} else {
										if ($lastID!=$rowEleves["ID_eleves"]) {
											if ($arrayID == $rowEleves["ID_eleves"]) {
												echo"<option value=".$rowEleves["ID_eleves"]." selected='true'>".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])." </option>";
											} else {
												echo"<option value=".$rowEleves["ID_eleves"].">".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])."</option>";
											}
											$lastID=$rowEleves["ID_eleves"];
										}
										
									}
									
									
								}
							}
						} else {
							echo "0 results";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Choix des matières</label>
					<select class="form-control" name="matiereSelect[]" multiple="true">
						<option disabled="true">Matières</option>
						<?php 
						$sql = "SELECT * FROM matieres ORDER BY Nom";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo"<option value=".$row["ID_matieres"].">".utf8_encode($row["Nom"])."</option>";
							}
						} else {
							echo "0 results";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Fichier à uploader (.zip)</label>
					<input type="file" class="form-control" name="userfile">					
				</div>
				<div class="form-group">
					<label>Lien du site de présentation</label>
					<textarea name="site" class="form-control" placeholder="Lien du site"><?php echo utf8_encode($row['Lien']); ?></textarea>				
				</div>
				<div class="form-group">
					<label>Logiciels utilisés</label>
					<textarea name="software" class="form-control" placeholder="Logiciels utilisés"><?php echo utf8_encode($row['Logiciel']); ?></textarea>				
				</div>
				<div class="form-group">
					<label>Configuration minimale</label>
					<textarea name="hardware" class="form-control" placeholder="Configuration PC, Périphériques externe"><?php echo utf8_encode($row['Materiel']); ?></textarea>
				</div>
				<?php 
				if($user_statut=="enseignant") {
					?> 
					<label>Poids</label>
					<input type="number" class="form-control" name="poids" min="0" max="100" value="50"><?php echo utf8_encode($row['Poids']); ?></input>     		
					<?php 
				}
				?>

				<button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
			</form>        
		</div>

	</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>