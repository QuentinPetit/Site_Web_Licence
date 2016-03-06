<!DOCTYPE html>

<html>
<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../CSS/style.css">
		<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../Ressources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../Ressources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</head>

	<header>
		<div>
			<img src="../Pictures/logo.png"/>
			<img src="../Pictures/worker.jpg"/>
		</div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li ><a href="index.php">Accueil</a></li>
					<li class="dropdown active">
						<a href="parcours.php">Parcours</a>
						
						<ul class="dropdown-menu">
							<?php

								include('../PHP/connexion.php');

								$sql = "SELECT Nom FROM parcours";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
									echo "<li><a href='parcours.html'>". utf8_encode($row["Nom"]) ."</a></li>";
									}
								} else {
									 echo "0 results";
								}
								
								include('../PHP/deconnexion.php');

							?>  
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="parcours.html">Projets</a>
						<ul class="dropdown-menu">
							<?php
								
								include('../PHP/connexion.php');

								$sql = "SELECT Nom FROM parcours";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
									echo "<li><a href='parcours.html'>". utf8_encode($row["Nom"]) ."</a></li>";
									}
								} else {
									 echo "0 results";
								}

								include('../PHP/deconnexion.php');

							?>  
						</ul>
					</li>
					<li><a href='contact.html'>Contact</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<body>
		<div class="row">
			<div class="col-xs-12" id="Parcours">
				<h2>Parcours</h2>
				<?php 	
					include('../PHP/connexion.php');

					$sql = "SELECT * FROM parcours";
					$result = $conn->query($sql);
					if ($result->num_rows > 0){
						while ($row = $result->fetch_assoc()) {
							echo "<section class='col-xs-12 well' style='background:".utf8_encode($row["Couleur"])."'> 
							<h3>".utf8_encode($row["Nom"])."</h3>
							<p>".utf8_encode($row["Description"])."</p>
							<a class='btn btn-default' href=".utf8_encode($row["Plaquette"])." target='_blank'>Télécharger la plaquette</a>";
							
							$sqlreseausociaux = "SELECT * FROM reseausociaux WHERE ID_parcours = ".utf8_encode($row["ID_parcours"]);
							$resultreseausociaux = $conn->query($sqlreseausociaux);
							if ($resultreseausociaux->num_rows>0){
								while ($rowreseausociaux=$resultreseausociaux->fetch_assoc()) {
									echo "<a class='btn btn-default' href='".utf8_encode($rowreseausociaux["Lien"])."' target='_blank'><img class='img-responsive' src='".utf8_encode($rowreseausociaux["Logo"])."'></a>";
								}
							}else{
								echo "0 result";
							}
							echo "</section>";
						}
					} else {
						echo "0 results";
					}

					include('../PHP/deconnexion.php');
				?>
			</div>
			<div class="col-xs-12" id="Entreprises">
				<h2>Entreprises</h2>
				<?php

					include('../PHP/connexion.php');
					$sql = "SELECT * FROM entreprises ORDER BY Nom";
					$result = $conn->query($sql);

					if ($result->num_rows>0) {
						while ( $row = $result->fetch_assoc()) {
							echo "
							<div class='col-xs-4 col-sm-3 col-md-2'>
								<a href='".utf8_encode($row["Lien"])."' target='_blank'>
									<img class='img-responsive' src='".utf8_encode($row["Logo"])."'>
								</a>
								<p>".utf8_encode($row["Nom"])."</p>
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
</html>


