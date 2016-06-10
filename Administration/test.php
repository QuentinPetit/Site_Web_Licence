<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include('../PHP/connexion.php'); ?>
<?php 
$sqlEleves = "SELECT * FROM eleves ORDER BY ID_eleves DESC";
	$resultEleves = $conn->query($sqlEleves);
	$sqlElevesToProjet = "SELECT ID_eleves FROM elevestoprojet WHERE ID_projets=21";
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
				echo "arrayID=".$arrayID."   rowEleves[ID_eleves]=".$rowEleves["ID_eleves"]."</br>";
				/*if ($arrayID == $rowEleves["ID_eleves"]) {
					echo $rowEleves["ID_eleves"]." ".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])." selected</br>";
				} else {
					echo $rowEleves["ID_eleves"]." ".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])."</br>";
				}*/
				if ($init==false){
					if ($arrayID == $rowEleves["ID_eleves"]) {
						echo $rowEleves["ID_eleves"]." ".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])." selected</br>";
					} else {
						echo"<option value=".$rowEleves["ID_eleves"].">".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])."</option>";
					}
					$init=true;
					$lastID=$rowEleves["ID_eleves"];
				} else {
					if ($lastID!=$rowEleves["ID_eleves"]) {
						if ($arrayID == $rowEleves["ID_eleves"]) {
							echo $rowEleves["ID_eleves"]." ".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])." selected</br>";
						} else {
							echo $rowEleves["ID_eleves"]." ".utf8_encode($rowEleves["Nom"])." ".utf8_encode($rowEleves["Prenom"])."</br>";
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
 <?php include('../PHP/deconnexion.php'); ?>
</body>
</html>