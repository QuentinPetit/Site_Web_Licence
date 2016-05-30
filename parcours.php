<!DOCTYPE html>

<html>
<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<script type="text/javascript" src="./Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="./Ressources/font-awesome-4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./Ressources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="./CSS/style.css">
		<link rel="stylesheet" href="./Ressources/bootstrap-social-gh-pages/bootstrap-social.css">
		<script type="text/javascript" src="./Ressources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</head>

	<header>
		<?php include('./PHP/header.php') ?>
	</header>
	
	<body>
		<div class="row">
			<div class="col-xs-12" id="Parcours">
				<h2>Parcours</h2>
				<?php 	
					include('./PHP/connexion.php');

					$sql = "SELECT * FROM parcours";
					$result = $conn->query($sql);
					if ($result->num_rows > 0){
						while ($row = $result->fetch_assoc()) {
							echo "<section class='col-xs-12 well' style='background:".utf8_encode($row["Couleur"])."'> 
							<a name='".utf8_encode($row["Nom"])."' href='parcoursDetail.php?parcoursId=".utf8_encode($row["ID_parcours"])."'><h3>".utf8_encode($row["Nom"])."</h3></a>
							<p>".utf8_encode($row["Description"])."</p>
							<a class='btn btn-default' href=".utf8_encode($row["Plaquette"])." target='_blank'>Télécharger la plaquette</a>";
							
							$sqlreseausociaux = "SELECT * FROM reseausociaux WHERE ID_parcours = ".utf8_encode($row["ID_parcours"]);
							$resultreseausociaux = $conn->query($sqlreseausociaux);
							if ($resultreseausociaux->num_rows>0){
								while ($rowreseausociaux=$resultreseausociaux->fetch_assoc()) {
									echo "<a class='btn btn-social-icon btn-".utf8_encode($rowreseausociaux["NomReseau"])."' href='".utf8_encode($rowreseausociaux["Lien"])."' target='_blank'><i class='fa fa-".utf8_encode($rowreseausociaux["NomReseau"])."'></i></a>";
								}
							}else{
								echo "0 result";
							}
							echo "</section>";
						}
					} else {
						echo "0 results";
					}

					include('./PHP/deconnexion.php');
				?>
			</div>
			<div class="col-xs-12" id="Entreprises">
				<h2>Entreprises</h2>
				<?php

					include('./PHP/connexion.php');
					$sql = "SELECT * FROM entreprises ORDER BY Nom";
					$result = $conn->query($sql);

					if ($result->num_rows>0) {
						while ( $row = $result->fetch_assoc()) {
							echo "
							<div class='col-xs-4 col-sm-3 col-md-2'>
								<a href='".utf8_encode($row["Lien"])."' target='_blank'>
									<img class='img-responsive' src='". utf8_encode($row["Logo"]) ."'>
								</a>
								<p>".utf8_encode($row["Nom"])."</p>
							</div>";
						}

					} else {
						echo "0 results";
					}
					

					include('./PHP/deconnexion.php');

				?>
			</div>
		</div>
	</body>
	<footer>

	</footer>
</html>


