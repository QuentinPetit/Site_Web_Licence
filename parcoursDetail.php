<!DOCTYPE html>
<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="./Ressources/BootstrapCustom/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="./CSS/style.css">
		<link rel="stylesheet" type="text/css" href="./CSS/style.php?background=<?php echo $_GET['parcoursId']; ?>" >
		
		<link type="text/css" rel="stylesheet" href="./CSS/customNavbar.css">
		<script type="text/javascript" src="./Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="./Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
	</head>
	<header>
		<?php include('./PHP/header.php') ?>
	</header>
	<body>
		<div class="container-fluid">
			<div class="col-xs-12 parallax2">
				<?php

					include('./PHP/connexion.php');

					$parcoursId=$_GET['parcoursId'];
					$sql = "SELECT * FROM parcours WHERE parcours.ID_parcours =".$parcoursId; 
					$result = $conn->query($sql);
					if ($result->num_rows >0) {
						while ($row = $result->fetch_assoc()) {
							echo "<h1>".utf8_encode($row["Nom"])."</h1>";
							echo "
								<div class='row grayBackground'>
									<h2>Objectifs</h2>
									<p>".utf8_encode($row["Objectifs"])."</p>
								</div>";
							echo "
								<div class='row grayBackground'>
									<h2>Compétences visées</h2>
									<p>".utf8_encode($row["Competences"])."</p>
								</div>";
							echo "
								<div class='row grayBackground'>
									<h2>Logiciels utilisés</h2>
									<p>".utf8_encode($row["Logiciels"])."</p>
								</div>";
							echo "
								<div class='row grayBackground'>
									<h2>Admissions</h2>
									<p>".utf8_encode($row["Admission"])."</p>
								</div>";
						}
					}

					include('./PHP/deconnexion.php');

				?>
			</div>
		</div>
	</body>
	<footer>
		
	</footer>
</html>