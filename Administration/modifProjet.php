
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
	print_r($_POST);
		if (isset($_POST['submit']) && 
			isset($_POST['nomProjets']) && 
			isset($_POST['description']) && 
			isset($_POST['caracteristiques']) && 
			isset($_POST['anneeScolaireSelect']) && 
			isset($_POST['parcoursSelect']) && 
			isset($_POST['participantsSelect']) && 
			isset($_POST['site']) && 
			isset($_POST['software']) && 
			isset($_POST['hardware']) && 
			isset($_POST['matiereSelect']) ) {
			echo "toto";
			if ($_POST['nomProjets'] != "" && 
				$_POST['description'] != "" && 
				$_POST['caracteristiques'] != "" && 
				count($_POST['parcoursSelect'])>0 && 
				ount($_POST['participantsSelect'])>0 && 
				$_POST['software'] !="" && 
				$_POST['hardware'] !="" &&
				count($_POST['matiereSelect'])>0) {

					$nomProjets=$_POST['nomProjets'];
					$description=$_POST['description'];
					$caracteristiques=$_POST['caracteristiques'];
					$anneeScolaireSelect=$_POST['anneeScolaireSelect'];
					$parcoursSelect=$_POST['parcoursSelect'];
					$participantsSelect=$_POST['participantsSelect'];
					$matiereSelect=$_POST['matiereSelect'];
					$software=$_POST['software'];
					$hardware=$_POST['hardware'];
					$idData=$_POST['idData'];

			}
		}
	?>
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
						$sqlParcours = "SELECT * FROM parcours";
						$resultParcours = $conn->query($sqlParcours);
						$sqlProjetsToParcours = "SELECT ID_parcours FROM projetstoparcours WHERE ID_projets=".$_GET['projetID'];
						$resultProjetsToParcours = $conn->query($sqlProjetsToParcours);
						$arrayIDs = array();
						if ($resultProjetsToParcours->num_rows > 0) {
							while ($rowProjetsToParcours = $resultProjetsToParcours->fetch_assoc()) {
								array_push($arrayIDs, $rowProjetsToParcours['ID_parcours']);
							}
						} else {
							echo "0 results";
						}
						if ($resultParcours->num_rows > 0) {
							while ($rowParcours = $resultParcours->fetch_assoc()) {
								$trouver=false;
								foreach ($arrayIDs as $arrayID) {
									if ($arrayID==$rowParcours['ID_parcours']) {
										$trouver=true;
									}
								}
								if ($trouver==true) {
									echo"<option value=".$rowParcours["Dossier"]." selected='true'>".utf8_encode($rowParcours["Nom"])."</option>";
								} else {
									echo"<option value=".$rowParcours["Dossier"]." >".utf8_encode($rowParcours["Nom"])."</option>";
								}
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
								$trouver=false;
								foreach ($arrayIDs as $arrayID) {
									if ($arrayID==$rowEleves['ID_eleves']) {
										$trouver=true;
									}
								}
								if ($trouver==true) {
									echo"<option value=".$rowEleves["ID_eleves"]." selected='true'>".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])." </option>";
								} else {
									echo"<option value=".$rowEleves["ID_eleves"].">".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])."</option>";
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
						$sqlMatieres = "SELECT * FROM matieres ORDER BY Nom";
						$resultMatieres = $conn->query($sqlMatieres);
						$sqlMatieresToProjet = "SELECT ID_matieres FROM matierestoprojet WHERE ID_projets=".$_GET['projetID'];
						$resultMatieresToProjet = $conn->query($sqlMatieresToProjet);
						$arrayIDs = array();
						if ($resultMatieresToProjet->num_rows > 0) {
							while ($rowMatieresToProjet = $resultMatieresToProjet->fetch_assoc()) {
								array_push($arrayIDs, $rowMatieresToProjet['ID_matieres']);
							}
						} else {
							echo "0 results";
						}
						if ($resultMatieres->num_rows > 0) {
							while ($rowMatieres = $resultMatieres->fetch_assoc()) {
								$trouver=false;
								foreach ($arrayIDs as $arrayID) {
									if ($arrayID==$rowMatieres['ID_matieres']) {
										$trouver=true;
									}
								}
								if ($trouver==true) {
									echo"<option value=".$rowMatieres["ID_matieres"]." selected='true'>".utf8_encode($rowMatieres["Nom"])."</option>";
								} else {
									echo"<option value=".$rowMatieres["ID_matieres"].">".utf8_encode($rowMatieres["Nom"])."</option>";
								}
							}
						} else {
							echo "0 results";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Fichier à uploader (.zip)</label>
					</br>
					<?php  
						$sqlData = "SELECT * FROM data WHERE ID_Projets=".$_GET['projetID'];
						$resultData = $conn->query($sqlData);
						if ($resultData->num_rows>0) {
							while ($rowData = $resultData->fetch_assoc()) {
								$array = explode("/", utf8_encode($rowData["Lien"]));
								if($rowData["ID_type"]!=3)
								{
									echo "<input type='checkbox' name='idData' value=".$rowData["ID_data"]." checked='true'>".end($array)."</input> </br>";
								}
							}
						} else {
							echo "0 result";
						}
						
					?>
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
					<input type="number" class="form-control" name="poids" min="0" max="100" value="<?php echo utf8_encode($row['Poids']); ?>"></input>     		
					<?php 
				}
				?>

				<button type="submit" class="btn btn-primary" name="submit">Modifier</button>
			</form>        
		</div>

	</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>