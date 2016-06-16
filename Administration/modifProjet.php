
<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Modification du projet </title>
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

		function copyr($source, $dest)
		{
			// Check for symlinks
			if (is_link($source)) {
			    return symlink(readlink($source), $dest);
			}

			// Simple copy for a file
			if (is_file($source)) {
			    return copy($source, $dest);
			}

			// Make destination directory
			if (!is_dir($dest)) {
			    mkdir($dest);
			}

			// Loop through the folder
			$dir = dir($source);
			while (false !== $entry = $dir->read()) {
			    // Skip pointers
			    if ($entry == '.' || $entry == '..') {
			        continue;
			    }

			    // Deep copy directories
			    copyr("$source/$entry", "$dest/$entry");
			}

			// Clean up
			$dir->close();
			return true;
		}

		function deleteDir($path) {
		return is_file($path) ?
			@unlink($path) :
			array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
		}

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
			isset($_POST['matiereSelect']) &&
			isset($_POST['idData'])) {
			if ($_POST['nomProjets'] != "" && 
				$_POST['description'] != "" && 
				$_POST['caracteristiques'] != "" && 
				count($_POST['parcoursSelect'])>0 && 
				count($_POST['participantsSelect'])>0 && 
				//$_POST['software'] !="" && 
				//$_POST['hardware'] !="" &&
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
					

					$uploadOk = 1;
					$sqlgetproject="SELECT * FROM projets WHERE ID_projets=".$_GET['projetID'].";";
					$resultgetproject = $conn->query($sqlgetproject);
					$rowgetproject=$resultgetproject->fetch_assoc();

					if ($anneeScolaireSelect!=$rowgetproject['ID_Annee'] ) {
						$array = explode("/", utf8_encode($rowgetproject['Miniature']));
						$oldMiniature = end($array);
						$secondtolast=count($array)-2;
						$thirdtolast=count($array)-3;
						$fourthtolast=count($array)-4;
						$oldproject_dir = 	"../Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
						$anneeDossier=null;
						$sqlnomannee = "SELECT * FROM anneescolaire WHERE ID_Annee=".$anneeScolaireSelect;
						$resultnomannee = $conn->query($sqlnomannee);
						if ($resultnomannee->num_rows > 0) {
							while ($rownomannee= $resultnomannee->fetch_assoc()) {
								$EndYears = date("Y", strtotime($rownomannee["DateFin"]));
								$StartYears = date("Y", strtotime($rownomannee["DateDebut"]));
								$anneeDossier = $StartYears."-".$EndYears;
							}
							$array[$fourthtolast]=$anneeDossier;
						} else {

						}
						$project_dir = 	"../Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
						$forlinkquery = "./Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
						if($oldproject_dir!=$project_dir){
							if(copyr($oldproject_dir,$project_dir)==true){
								$sqlDataSelect = "SELECT * FROM data WHERE ID_projets=".$_GET['projetID'].";";
								$resultDataSelect = $conn->query($sqlDataSelect);
								if($resultDataSelect->num_rows>0){
									while ($rowDataSelect=$resultDataSelect->fetch_assoc()){
										if($rowDataSelect['ID_type']!=3){
											$olddatalien=explode("/", utf8_encode($rowDataSelect['Lien']));
											$datalien = $forlinkquery."/data/".end($olddatalien);
											$sqlupdatedata = "UPDATE data SET Lien='".$datalien."' WHERE ID_data=".$rowDataSelect['ID_data'].";";
											$conn->query($sqlupdatedata);
										}
									}
								}
								$lienminiature=$forlinkquery."/".$oldMiniature;
								$sqlupdateminiature="UPDATE projets SET Miniature='".$lienminiature."' WHERE ID_projets=".$_GET['projetID'].";";
								$conn->query($sqlupdateminiature);
								$oldlienprojet = explode("/", utf8_encode($rowgetproject['Fichier_Projet']));
								$lienprojet=$forlinkquery."/projet/".end($oldlienprojet);
								$sqlupdatelienprojet = "UPDATE projets SET Fichier_Projet='".$lienprojet."' WHERE ID_projets=".$_GET['projetID'].";";
								$conn->query($sqlupdatelienprojet);
								$sqlupdateidannee="UPDATE projets SET ID_Annee='".$anneeScolaireSelect."' WHERE ID_projets=".$_GET['projetID'].";";
								$conn->query($sqlupdateidannee);
								deleteDir($oldproject_dir);
							}
						}
					}
					//Parcours
					$sqlgetproject="SELECT * FROM projets WHERE ID_projets=".$_GET['projetID'].";";
					$resultgetproject = $conn->query($sqlgetproject);
					$rowgetproject=$resultgetproject->fetch_assoc();
					if (count($parcoursSelect)>=2) {
						$array = explode("/", utf8_encode($rowgetproject['Miniature']));
						$oldMiniature = end($array);
						$secondtolast=count($array)-2;
						$thirdtolast=count($array)-3;
						$fourthtolast=count($array)-4;
						$oldproject_dir = 	"../Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
						if ($array[$thirdtolast]!="Common") {
							$array[$thirdtolast] = "Common";
							$project_dir = 	"../Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
							$forlinkquery = "./Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
							if (copyr($oldproject_dir, $project_dir)==true) {
								$sqlDataSelect = "SELECT * FROM data WHERE ID_projets=".$_GET['projetID'].";";
								$resultDataSelect = $conn->query($sqlDataSelect);
								if($resultDataSelect->num_rows>0){
									while ($rowDataSelect=$resultDataSelect->fetch_assoc()){
										if($rowDataSelect['ID_type']!=3){
											$olddatalien=explode("/", utf8_encode($rowDataSelect['Lien']));
											$datalien = $forlinkquery."/data/".end($olddatalien);
											$sqlupdatedata = "UPDATE data SET Lien='".$datalien."' WHERE ID_data=".$rowDataSelect['ID_data'].";";
											$conn->query($sqlupdatedata);
										}
									}
								}
								$lienminiature=$forlinkquery."/".$oldMiniature;
								$sqlupdateminiature="UPDATE projets SET Miniature='".$lienminiature."' WHERE ID_projets=".$_GET['projetID'].";";
								$conn->query($sqlupdateminiature);
								$oldlienprojet = explode("/", utf8_encode($rowgetproject['Fichier_Projet']));
								$lienprojet=$forlinkquery."/projet/".end($oldlienprojet);
								$sqlupdatelienprojet = "UPDATE projets SET Fichier_Projet='".$lienprojet."' WHERE ID_projets=".$_GET['projetID'].";";
								$conn->query($sqlupdatelienprojet);
							}
							$sqldeleteprojettoparcours="DELETE FROM projetstoparcours WHERE ID_projets=".$_GET['projetID'];
							$conn->query($sqldeleteprojettoparcours);
							foreach ($parcoursSelect as $parcoursSelected) {
								$sqlIDParcours = "SELECT * FROM parcours WHERE Dossier = '".$parcoursSelected."'";
								$resultIDParcours = $conn->query($sqlIDParcours);
								$rowIDParcours = $resultIDParcours->fetch_assoc();
								$sqlinsertprojetstoparcours = "INSERT INTO projetstoparcours (ID_projets, ID_parcours) VALUES ('".$_GET['projetID']."','".$rowIDParcours['ID_parcours']."');";
								$conn -> query($sqlinsertprojetstoparcours);
							}
							deleteDir($oldproject_dir);
						}
					} else {
						$array = explode("/", utf8_encode($rowgetproject['Miniature']));
						$oldMiniature = end($array);
						$secondtolast=count($array)-2;
						$thirdtolast=count($array)-3;
						$fourthtolast=count($array)-4;
						$oldproject_dir = 	"../Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
						if ($array[$thirdtolast] != $parcoursSelect[0]) {
							$array[$thirdtolast] = $parcoursSelect[0];
							$project_dir = 	"../Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
							$forlinkquery = "./Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast];
							if (copyr($oldproject_dir, $project_dir)==true) {
								$sqlDataSelect = "SELECT * FROM data WHERE ID_projets=".$_GET['projetID'].";";
								$resultDataSelect = $conn->query($sqlDataSelect);
								if($resultDataSelect->num_rows>0){
									while ($rowDataSelect=$resultDataSelect->fetch_assoc()){
										if($rowDataSelect['ID_type']!=3){
											$olddatalien=explode("/", utf8_encode($rowDataSelect['Lien']));
											$datalien = $forlinkquery."/data/".end($olddatalien);
											$sqlupdatedata = "UPDATE data SET Lien='".$datalien."' WHERE ID_data=".$rowDataSelect['ID_data'].";";
											$conn->query($sqlupdatedata);
										}
									}
								}
								$lienminiature=$forlinkquery."/".$oldMiniature;
								$sqlupdateminiature="UPDATE projets SET Miniature='".$lienminiature."' WHERE ID_projets=".$_GET['projetID'].";";
								$conn->query($sqlupdateminiature);
								$oldlienprojet = explode("/", utf8_encode($rowgetproject['Fichier_Projet']));
								$lienprojet=$forlinkquery."/projet/".end($oldlienprojet);
								$sqlupdatelienprojet = "UPDATE projets SET Fichier_Projet='".$lienprojet."' WHERE ID_projets=".$_GET['projetID'].";";
								$conn->query($sqlupdatelienprojet);
							}
							$sqldeleteprojettoparcours="DELETE FROM projetstoparcours WHERE ID_projets=".$_GET['projetID'];
							$conn->query($sqldeleteprojettoparcours);
							foreach ($parcoursSelect as $parcoursSelected) {
								$sqlIDParcours = "SELECT * FROM parcours WHERE Dossier = '".$parcoursSelected."'";
								$resultIDParcours = $conn->query($sqlIDParcours);
								$rowIDParcours = $resultIDParcours->fetch_assoc();
								$sqlinsertprojetstoparcours = "INSERT INTO projetstoparcours (ID_projets, ID_parcours) VALUES ('".$_GET['projetID']."','".$rowIDParcours['ID_parcours']."');";
								$conn -> query($sqlinsertprojetstoparcours);
							}
							deleteDir($oldproject_dir);
						}
					}

					$sqldeleteelevestoprojet = "DELETE FROM elevestoprojet WHERE ID_projets=".$_GET['projetID'];
					$conn -> query($sqldeleteelevestoprojet);

					foreach ($participantsSelect as $participantsSelected) {
						$sqlelevestoprojet = "INSERT INTO elevestoprojet (ID_eleves, ID_projets) VALUES ('".$participantsSelected."','".$_GET['projetID']."');";
						$conn->query($sqlelevestoprojet);
					}

					$sqldeletematieretoprojet = "DELETE FROM matierestoprojet WHERE ID_projets=".$_GET['projetID'];
					$conn -> query($sqldeletematieretoprojet);

					foreach ($matiereSelect as $matiereSelected) {
						$sqlmatierestoprojet = "INSERT INTO matierestoprojet (ID_projets, ID_matieres) VALUES ('".$_GET['projetID']."','".$matiereSelected."');";
						$conn->query($sqlmatierestoprojet);
					}
					$sqlselectiddata="SELECT * FROM data WHERE ID_Projets =".$_GET['projetID'];
					$resultselectidata=$conn->query($sqlselectiddata);
					if($resultselectidata->num_rows>0)
					{
						while ($rowselectiddata = $resultselectidata->fetch_assoc()) {
							if (in_array($rowselectiddata['ID_data'], $idData) == FALSE)
							{
								$sqldeleteiddata = "DELETE FROM data WHERE ID_data=".$rowselectiddata['ID_data'];
								$conn->query($sqldeleteiddata);
							}
						}
					}
					$sqlgetproject="SELECT * FROM projets WHERE ID_projets=".$_GET['projetID'].";";
					$resultgetproject = $conn->query($sqlgetproject);
					$rowgetproject=$resultgetproject->fetch_assoc();
					if ($_FILES['userfile']['name']!="") {
						$array = explode("/", utf8_encode($rowgetproject['Miniature']));
						$oldMiniature = end($array);
						$secondtolast=count($array)-2;
						$thirdtolast=count($array)-3;
						$fourthtolast=count($array)-4;
						$dataPath = array();
						$uploadarray = explode(".", $_FILES["userfile"]["name"]);
						$fileName = $uploadarray[0];
						$fileExtension = strtolower(end($uploadarray));
						$projectFile = null;
						$anneeDossier=$array[$fourthtolast];
						$dossierParcours=$array[$thirdtolast];
						if ($fileExtension == "zip") {
							
							move_uploaded_file($_FILES["userfile"]["tmp_name"], "../tmp/".$_FILES["userfile"]["name"]);
							$zip = new ZipArchive();
							$zip -> open("../tmp/".$_FILES["userfile"]["name"]);
							for ($num=0; $num < $zip -> numFiles; $num++) {
								$arrayTmp = explode("/", $zip -> getNameIndex($num));
								if (end($arrayTmp)!="") {
									if ($arrayTmp[1]=="data")
									{
										array_push($dataPath, "./Projets/".$anneeDossier."/".$dossierParcours."/". $zip -> getNameIndex($num));
									}
								}
								$zip -> extractTo("../Projets/".$anneeDossier."/".$dossierParcours."/");
							}
							$zip -> close();
							unlink("../tmp/".$_FILES["userfile"]["name"]);

						} else {
							echo "Only .zip";
						}
						$typeArray = array();
						$sqlTypes="SELECT * FROM type"; 
						$resultTypes = $conn->query($sqlTypes);
						while ($rowTypes = $resultTypes->fetch_assoc()) {
							$typeArray[utf8_encode($rowTypes['Type'])]=$rowTypes['ID_type'];
					      	//array_push($typeArray, $rowTypes['Type'] => $rowTypes['Type']);
						}
						foreach ($dataPath as $singleData) {
							$singleDataTmp = explode(".", $singleData);
							if (end($singleDataTmp) == "jpg" || end($singleDataTmp) == "jpeg" || end($singleDataTmp) == "png" || end($singleDataTmp) == "gif") {
								$type = $typeArray["Image"];
							}
							if (end($singleDataTmp) == "mp4"){
								$type = $typeArray["Vidéo MP4"];
							}
							if (end($singleDataTmp) == "obj") {
								$type = $typeArray["Modélisation"];
							}
							$sqlData = "INSERT INTO data (ID_type, ID_Projets, Lien) VALUES('".$type."', '".$_GET['projetID']."', '".$singleData."');";
							$conn -> query($sqlData);
						}
					}
					

					if ($_FILES['miniatureUpload']['name']!="") {
						$array = explode("/", utf8_encode($rowgetproject['Miniature']));
						$secondtolast=count($array)-2;
						$thirdtolast=count($array)-3;
						$fourthtolast=count($array)-4;
						$target_dirMiniature = "../Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast]."/";
						$target_fileMiniature=$target_dirMiniature.basename($_FILES["miniatureUpload"]["name"]);
						echo $target_fileMiniature;
						$miniatureFileType = pathinfo($target_fileMiniature, PATHINFO_EXTENSION);
						if($miniatureFileType != "jpg" ) {
							$error="Désolé, seuls les fichiers JPG sont autorisés pour les miniatures.";
							$uploadOk = 0;
						}
						if (file_exists($target_fileMiniature)) {
							echo "Replacing thumbnail";
							unlink($target_fileMiniature);
							move_uploaded_file($_FILES['miniatureUpload']['tmp_name'], $target_fileMiniature);
						}
					}
					if ($_FILES['projetUpload']['name']!="") {
						$array = explode("/", utf8_encode($rowgetproject['Miniature']));
						$secondtolast=count($array)-2;
						$thirdtolast=count($array)-3;
						$fourthtolast=count($array)-4;
						$target_dirProjet = "../Projets/".$array[$fourthtolast]."/".$array[$thirdtolast]."/".$array[$secondtolast]."/projet/";
						$target_fileProjet=$target_dirProjet.basename($_FILES["projetUpload"]["name"]);
						echo $target_fileProjet;
						$projetFileType = pathinfo($target_fileProjet, PATHINFO_EXTENSION);
						if($projetFileType != "zip" ) {
							$error="Désolé, seuls les fichiers zip sont autorisés pour les projets.";
							$uploadOk = 0;
						}
						if (file_exists($target_fileProjet)) {
							echo "Replacing thumbnail";
							unlink($target_fileProjet);
							move_uploaded_file($_FILES['projetUpload']['tmp_name'], $target_fileProjet);
						}
					}
					$poids=null;
					if ($user_statut=="enseignant") {
						$poids=$_POST['poids'];
					} else {
						$poids=$rowgetproject['Poids'];
					}
					$site = null;
					if ($_POST['site']!="") {
						$site=$_POST['site'];
					} else {
						$site=$rowgetproject['Lien'];
					}
					$sqlupdate = "UPDATE projets  SET Nom ='".utf8_decode($nomProjets)."', Description ='".utf8_decode($description)."', Caracteristique ='".utf8_decode($caracteristiques)."', Logiciel ='".utf8_decode($software)."', Materiel ='".utf8_decode($hardware)."', Lien ='".utf8_decode($site)."', Poids = '".$poids."' WHERE ID_projets=".$_GET['projetID'].";";
					$conn->query($sqlupdate);
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
					<label>Choix de l'année scolaire</label>
					<select class="form-control" name="anneeScolaireSelect">

						<option disabled="true">Année Scolaire</option>
						<?php 
						$sqlDate = "SELECT * FROM anneescolaire ORDER BY DateFin DESC";
						$resultDate = $conn->query($sqlDate);

						if ($resultDate->num_rows > 0) {
							while ($rowDate = $resultDate->fetch_assoc()) {
								$EndYears = date("Y", strtotime($rowDate["DateFin"]));
								$StartYears = date("Y", strtotime($rowDate["DateDebut"]));
								if ($rowDate["ID_Annee"]==$row["ID_Annee"]) {

									echo "<option value=".$rowDate["ID_Annee"]." selected='true'>".$StartYears."-".$EndYears."</option>";
								} else {
									echo "<option value=".$rowDate["ID_Annee"].">".$StartYears."-".$EndYears."</option>";
								}
							}
						} 
						?>
					</select>
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
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Fichiers d'illustration du projet (zip)</label>
					</br>
					<?php  
						$sqlData = "SELECT * FROM data WHERE ID_Projets=".$_GET['projetID'];
						$resultData = $conn->query($sqlData);
						if ($resultData->num_rows>0) {
							while ($rowData = $resultData->fetch_assoc()) {
								$array = explode("/", utf8_encode($rowData["Lien"]));
								if($rowData["ID_type"]!=3)
								{
									echo "<input type='checkbox' name='idData[]' value=".$rowData["ID_data"]." checked='true'>".end($array)."</input> </br>";
								}
							}
						}
						
					?>
					<input type="file" class="form-control" name="userfile">				
				</div>
				<div class="form-group">
					<label>Miniature (.jpg, .png, .gif)</label>
					</br>
					<label><?php  $array=explode("/", utf8_encode($row["Miniature"])); $oldMiniature=end($array); echo end($array);?></label>
					<input type="file" class="form-control" name="miniatureUpload">				
				</div>
				<div class="form-group">
					<label>Fichiers source du projet (.zip)</label>
					</br>
					<label><?php  $array=explode("/", utf8_encode($row["Fichier_Projet"])); echo end($array);?></label>
					<input type="file" class="form-control" name="projetUpload">					
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