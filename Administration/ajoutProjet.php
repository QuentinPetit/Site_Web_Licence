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
      <form action="ajoutProjet.php" method="POST" enctype="multipart/form-data">
        <h1>Ajouter un projet</h1>
        <div class="form-group">
        	<label>Non du projet</label>
          <textarea class="form-control" name="nomProjets" maxlength="50" placeholder="Nom du projet" rows="1"></textarea>    
        </div>

				<div class="form-group">
					<label>Description</label>
          <textarea class="form-control" name="description" placeholder="Description du projet (synopsis, context...)" rows="5" wrap="hard"></textarea>					
				</div>

				<div class="form-group">
					<label>Caractéristiques</label>
          <textarea class="form-control" name="caracteristiques" placeholder="Caractéristiques du projet : toute technique spécifiques au projet (lancer de rayon, shader, modélisation low-poly...)" rows="5" wrap="hard"></textarea>					
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
	            } else {
	              echo "0 results";
	            }
	          ?>
	        </select>
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
	            $sql = "SELECT * FROM eleves ORDER BY ID_eleves DESC";
	            $result = $conn->query($sql);

	            if ($result->num_rows > 0) {
	              while ($row = $result->fetch_assoc()) {
	                echo"<option value=".$row["ID_eleves"].">".utf8_encode($row["Nom"])." ".utf8_encode($row["Prenom"])." </option>";
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
        	<textarea name="site" class="form-control" placeholder="Lien du site"></textarea>				
				</div>
				<div class="form-group">
					<label>Logiciels utilisés</label>
	        <textarea name="software" class="form-control" placeholder="Logiciels utilisés"></textarea>				
				</div>
				<div class="form-group">
					<label>Configuration minimale</label>
					<textarea name="hardware" class="form-control" placeholder="Configuration PC, Périphériques externe"></textarea>
				</div>
        <?php 
        	if($user_statut=="enseignant") {
        		?> 
        			<label>Poids</label>
        			<input type="number" class="form-control" name="poids" min="0" max="100" value="50"></input>     		
        		 <?php 
        	}
          ?>

        <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
      </form>        
    </div>
  
  </div>

  <?php
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
    	isset($_POST['matiereSelect'])) 
    	{

	    	if($_POST['nomProjets'] != "" && 
	    	$_POST['description'] != "" && 
	    	$_POST['caracteristiques'] != "" &&  
	    	count($_POST['parcoursSelect'])>0 && 
	    	count($_POST['participantsSelect'])>0 && 
	    	$_POST['software'] !="" && 
	    	$_POST['hardware'] !="" &&
	    	count($_POST['matiereSelect'])>0) 
	    	{
	    		//Les données venant du post
		      $nomProjets=$_POST['nomProjets'];
		      $description=$_POST['description'];
		      $caracteristiques=$_POST['caracteristiques'];
		      $anneeScolaireSelect=$_POST['anneeScolaireSelect'];
		      $parcoursSelect=$_POST['parcoursSelect'];
		      $participantsSelect=$_POST['participantsSelect'];
		      $matiereSelect=$_POST['matiereSelect'];
		      $software=$_POST['software'];
		      $hardware=$_POST['hardware'];
		      //$poids=$_POST['poids'];

		      //Récupération du nom du dossier année scolaire
		      $anneeDossier=null;
		      $sql = "SELECT * FROM anneescolaire WHERE ID_Annee=".$anneeScolaireSelect;
		      $result = $conn->query($sql);
		      if ($result->num_rows > 0) {
		        while ($row = $result->fetch_assoc()) {
		          $EndYears = date("Y", strtotime($row["DateFin"]));
		          $StartYears = date("Y", strtotime($row["DateDebut"]));
		          $anneeDossier = $StartYears."-".$EndYears;
		        }
		      } else {
		        echo "0 results";
		      }

		      //Dossier concernant le parcours
		      $dossierParcours = null;
		      $nbParcours=count($parcoursSelect);

		      if($nbParcours>1)
		      {
		        $dossierParcours="Common";
		      }
		      else
		      {
		        $dossierParcours=$parcoursSelect[0];
		      }
		      //Extraction du zip
		      $array = explode(".", $_FILES["userfile"]["name"]);
		      $fileName = $array[0];
		      $fileExtension = strtolower(end($array));

		      $dataPath = array();
		      $projectFile = null;
		      if ($fileExtension == "zip") {
		        if (is_dir("../Projets/".$anneeDossier."/".$dossierParcours."/".$fileName) == false) {
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
		          		if ($arrayTmp[1]=="projet") {
		          			$projectFile="./Projets/".$anneeDossier."/".$dossierParcours."/". $zip -> getNameIndex($num);
		          		}
		          	}
		            $zip -> extractTo("../Projets/".$anneeDossier."/".$dossierParcours."/");
		          }
		          $zip -> close();
		          unlink("../tmp/".$_FILES["userfile"]["name"]);
		        } else {
		          echo $fileName."was already unzipped";
		        }
		      } else {
		        echo "Only .zip";
		      }

		      if (isset($_POST['poids'])) {
		      	$poids = $_POST['poids'];
		      } else {
		      	$poids = 50;
		      }

		      if ($_POST['site']!="")
		      {
		      	$site=$_POST['site'];
		      } else {
		      	$site="";
		      }

		      $miniature="./Projets/".$anneeDossier."/".$dossierParcours."/".$fileName."/miniature.jpg";
		      $sql="INSERT INTO projets (ID_Annee, Nom, Date, Description, Caracteristique, Logiciel, Materiel, Poids, Miniature, Fichier_Projet, Lien) VALUES ('".$anneeScolaireSelect."', '".$nomProjets."', NOW(), '".$description."', '".$caracteristiques."', '".$software."', '".$hardware."', '".$poids."', '".$miniature."', '".$projectFile."', '".$site."');";
		      $conn->query($sql);

		      $sqlLastProject="SELECT * FROM projets ORDER BY Date DESC LIMIT 1";
		      $resultLastProject = $conn->query($sqlLastProject);
		      $rowLastProject = $resultLastProject->fetch_assoc();
		      $IDLastProject = $rowLastProject['ID_projets'];

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
		      	$sqlData = "INSERT INTO data (ID_type, ID_Projets, Lien) VALUES('".$type."', '".$IDLastProject."', '".$singleData."');";
		      	$conn -> query($sqlData);
		      }

		      foreach ($parcoursSelect as $parcoursSelected) {
		      	$sqlIDParcours = "SELECT * FROM parcours WHERE Dossier = '".$parcoursSelected."'";
		      	$resultIDParcours = $conn->query($sqlIDParcours);
		      	$rowIDParcours = $resultIDParcours->fetch_assoc();
		      	$sqlprojetstoparcours = "INSERT INTO projetstoparcours (ID_projets, ID_parcours) VALUES ('".$IDLastProject."','".$rowIDParcours['ID_parcours']."');";
		      	$conn -> query($sqlprojetstoparcours);
		      }

		      foreach ($participantsSelect as $participantsSelected) {
		      	$sqlelevestoprojet = "INSERT INTO elevestoprojet (ID_eleves, ID_projets) VALUES ('".$participantsSelected."','".$IDLastProject."');";
		      	$conn->query($sqlelevestoprojet);
		      }

		      foreach ($matiereSelect as $matiereSelected) {
		      	$sqlmatierestoprojet = "INSERT INTO matierestoprojet (ID_projets, ID_matieres) VALUES ('".$IDLastProject."','".$matiereSelected."');";
		      	$conn->query($sqlmatierestoprojet);
		      }
	    	}
    }
  ?>
  <?php include('../PHP/deconnexion.php'); ?>
</body>
</html>