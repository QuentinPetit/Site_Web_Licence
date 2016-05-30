<!DOCTYPE html>
<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" href="./CSS/style.css">
		<link rel="stylesheet" type="text/css" href="./Ressources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="./Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="./Ressources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</head>
	<header>
		<?php include('./PHP/header.php') ?>
	</header>
	<body>
		<div class="row">
			<div class="col-xs-12 well">
				<?php

					include('./PHP/connexion.php');

					$parcoursId=$_GET['parcoursId'];
					$sql = "SELECT * FROM parcours WHERE parcours.ID_parcours =".$parcoursId; 
					$result = $conn->query($sql);
					if ($result->num_rows >0) {
						while ($row = $result->fetch_assoc()) {
							echo "<h1>".utf8_encode($row["Nom"])."</h1>";
							echo "
								<article>
									<h2>Objectifs</h2>
									<p>".utf8_encode($row["Objectifs"])."</p>
								</article>";
							echo "
								<article>
									<h2>Compétences visées</h2>
									<p>".utf8_encode($row["Competences"])."</p>
								</article>";
							echo "
								<article>
									<h2>Logiciels utilisés</h2>
									<p>".utf8_encode($row["Logiciels"])."</p>
								</article>";
							echo "
								<article>
									<h2>Admissions</h2>
									<p>".utf8_encode($row["Admission"])."</p>
								</article>";
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