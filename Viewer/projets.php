<!DOCTYPE html>
<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		
		<link rel="stylesheet" type="text/css" href="../Ressources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../Ressources/font-awesome-4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../Ressources/bootstrap-rating-master/bootstrap-rating.css">
		<link type="text/css" rel="stylesheet" href="../CSS/style.css">
		<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="../Ressources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../Ressources/bootstrap-rating-master/bootstrap-rating.js"></script>
	</head>
	<header>
		<?php include('../PHP/header.php') ?>
	</header>
	<body>
		<div class="row">
			<div class="col-xs-12 well">
				<?php

					$parcoursId=$_GET['parcoursId'];
					$years; 
					$matiere;
					$init=false;
					include('../PHP/connexion.php');

					$sql="SELECT projets.Nom AS NomProjet, matieres.Nom AS NomMatiere, anneescolaire.DateFin, anneescolaire.DateDebut, projets.Miniature, projets.Poids, projets.ID_projets FROM projets, matierestoprojet, matieres, anneescolaire WHERE projets.ID_Annee = anneescolaire.ID_Annee 
						AND projets.ID_projets = matierestoprojet.ID_projets
						AND matieres.ID_matieres = matierestoprojet.ID_matieres
						AND ID_parcours='".$parcoursId."'ORDER BY DateFin DESC, NomMatiere, Poids DESC";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						echo"<section class='col-xs-12 well'>";
						while ($row = $result->fetch_assoc()) {
							if ($init==false) {
								$EndYears = date("Y", strtotime($row["DateFin"]));
								$StartYears = date("Y", strtotime($row["DateDebut"]));
								$matiere=utf8_encode($row["NomMatiere"]);
								echo "<h1>".$StartYears."-".$EndYears."</h1>";
								echo "<section class='col-xs-12'>";
								echo "<h2>".utf8_encode($row["NomMatiere"])."</h2>";
								$init=true;
							}
							if(date("Y", strtotime($row["DateFin"]))!=$EndYears || date("Y", strtotime($row["DateDebut"]))!=$StartYears)
							{
								$StartYears = date("Y", strtotime($row["DateDebut"]));
								$EndYears = date("Y", strtotime($row["DateFin"]));
								echo "</section>";
								echo "</section>";
								echo"<section class='col-xs-12 well'>";
								echo "<h1>".$StartYears."-".$EndYears."</h1>";
								echo "<section class='col-xs-12'>";
								echo "<h2>".utf8_encode($row["NomMatiere"])."</h2>";
								$matiere=utf8_encode($row["NomMatiere"]);
							}

							if ($matiere!=utf8_encode($row["NomMatiere"]))
							{
								$matiere=utf8_encode($row["NomMatiere"]);
								echo "</section>";
								echo "<section class='col-xs-12'>";
								echo "<h2>".utf8_encode($row["NomMatiere"])."</h2>";
							}
							echo "
							<div class='picholder col-xs-4 col-sm-3 col-md-2'>
									<img class='fancypics' src='".utf8_encode($row["Miniature"])."'>
									<a href='projet.php?projetID=".utf8_encode($row["ID_projets"])."'>
										<div class='overlay'>
											<p class='text_box'>".utf8_encode($row["NomProjet"])."</p>
											<div class='star-rating'><input id='inner-rating' type='hidden' class='rating' data-readonly value='".$row["Poids"]."'></div>
										</div>
									</a>
							</div>";							
							
						} echo "</section>";
					} else {
						echo "0 results";
					}
					

					include('../PHP/deconnexion.php');
				?>
			</div>
		</div>
	</body>

	<footer>

	</footer>
</html>