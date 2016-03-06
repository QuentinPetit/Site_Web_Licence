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
		<div>
			<img src="../Pictures/logo.png"/>
			<img src="../Pictures/worker.jpg"/>
		</div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Accueil</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="parcours.php">Parcours</a>
						
						<ul class="dropdown-menu">
							<?php

								include('../PHP/connexion.php');

								$sql = "SELECT * FROM parcours";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
									echo "<li><a href='parcours.php#".utf8_encode($row["Nom"])."'>". utf8_encode($row["Nom"]) ."</a></li>";
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

								$sql = "SELECT * FROM parcours";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
									echo "<li><a href='projets.php?parcoursId=".utf8_encode($row["ID_parcours"])."'>". utf8_encode($row["Nom"]) ."</a></li>";
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
		<?php

			$parcoursId=$_GET['parcoursId'];

			include('../PHP/connexion.php');

			$sql="SELECT * FROM projets WHERE ID_parcours='".$parcoursId."'ORDER BY Date DESC, Poids DESC";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "
						<div class='col-xs-4 col-sm-3 col-md-2'>
								<img class='img-responsive' src='".utf8_encode($row["Miniature"])."'>
							<p>".utf8_encode($row["Nom"])."</p>
						</div>";
				}
			} else {
				echo "0 results";
			}
			

			include('../PHP/deconnexion.php');
		?>
	</body>

	<footer>

	</footer>
</html>