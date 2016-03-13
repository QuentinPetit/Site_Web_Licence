<!DOCTYPE html>
<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../CSS/style.css">
		<link rel="stylesheet" type="text/css" href="../Ressources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="../Ressources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</head>
	<header>
		<?php include('../PHP/header.php') ?>
	</header>

	<body>
		<div class="row">
			<div class="col-xs-12 well">
				<?php

					include('../PHP/connexion.php');

					$projetID = $_GET['projetID'];
					
					$sql = "SELECT * FROM projets WHERE projets.ID_projets =".$projetID; //
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<h1>".utf8_encode($row["Nom"])."</h1>
							<div align='center' class='embed-responsive embed-responsive-16by9 videoplayer'>
								<video class='embed-responsive-item' controls>
									<source src='".utf8_encode($row["Video"])."' type = 'video/mp4'>
								</video>
							</div>
							<div class='col-xs-12 well'>
							<h2>Description</h2>
							<p>".utf8_encode($row["Description"])."</p>
							<h2>Caractéristiques</h2>
							<p>".utf8_encode($row["Caracteristique"])."</p>
							</div>
							<div class='col-xs-12 well'>
								<h2>Participants</h2>
								";
								$sqleleves="SELECT eleves.Nom, eleves.Prenom FROM eleves, projets, elevestoprojet WHERE projets.ID_projets = elevestoprojet.ID_projets AND eleves.ID_eleves = elevestoprojet.ID_eleves AND projets.ID_projets =".$projetID;
								$resulteeleves = $conn->query($sqleleves);
								if($resulteeleves->num_rows >0)
								{
									while ($roweleves = $resulteeleves->fetch_assoc()) {
										echo utf8_encode($roweleves["Nom"])." ".utf8_encode($roweleves["Prenom"]).",";
									}
								}
								echo "
							</div>
							<div>
								<div class='break col-xs-12 col-sm-8 well'>
									<h2>Hardware</h2>
									<p>".utf8_encode($row["Materiel"])."</p>
									<h2>Software</h2>
									<p>".utf8_encode($row["Logiciel"])."</p>
								</div>
								
								</div>
								<div class='break col-xs-12 col-sm-4'>
									<a class='btn btn-default' href=".utf8_encode($row["Fichier_Projet"]).">Télécharger le projet</a>
									<a class='btn btn-default' href=".utf8_encode($row["Lien"])." target='_blank'>Site du projet</a>
								</div>
							
							</div>";

						}
					} else {
						echo "0 results";
					}
					

					include('../PHP/deconnexion.php');

				?>
			</div>
		</div>
	</body>
</hmtl>