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
		<div class="row">
			<div class="col-xs-12 well">
				<?php

					$parcoursId=$_GET['parcoursId'];

					include('../PHP/connexion.php');

					$sql="SELECT * FROM projets WHERE ID_parcours='".$parcoursId."'ORDER BY Date DESC, Poids DESC";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {

						while ($row = $result->fetch_assoc()) {
							echo "
								<div class='picholder col-xs-4 col-sm-3 col-md-2'>
										<img class='fancypics' src='".utf8_encode($row["Miniature"])."'>
										<div class='overlay'>
											<p class='text_box'>".utf8_encode($row["Nom"])."</p>
											<div class='star-rating'><input id='inner-rating' type='hidden' class='rating' data-readonly value='".$row["Poids"]."'></div>
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

	<footer>

	</footer>
</html>