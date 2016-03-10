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
					
					$sql = "SELECT * FROM projets WHERE ID_projets =".$projetID;
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<h1>".utf8_encode($row["Nom"])."</h1>
							<div align='center' class='embed-responsive embed-responsive-16by9 videoplayer'>
								<video class='embed-responsive-item' controls>
									<source src='".utf8_encode($row["Video"])."' type = 'video/mp4'>
								</video>
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