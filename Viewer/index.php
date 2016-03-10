<!DOCTYPE html>

<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../CSS/style.css">
		<link rel="stylesheet" type="text/css" href="../Ressources/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="../Ressources/owl-carousel/owl.theme.css">
		<link rel="stylesheet" type="text/css" href="../Ressources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="../Ressources/owl-carousel/owl.carousel.js"></script>
		<script type="text/javascript" src="../Ressources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../JS/customCaroussel.js"></script>
	</head>

	<header>
		<?php include('../PHP/header.php') ?>
	</header>

	<body>
		<div class="row">
			<div class="actu col-xs-12 col-sm-8 well">
				<?php
							
					include('../PHP/connexion.php');

					$sql = "SELECT Titre, Article FROM actualites ORDER BY DateCreation DESC LIMIT 2";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						echo "<h2>". utf8_encode($row["Titre"]) ."</h2>";
						echo "<article>". utf8_encode($row["Article"]) ."</article>";
						}
					} else {
						 echo "0 results";
					}

					include('../PHP/deconnexion.php');

				?>  
			</div>
			<div class="actu col-xs-12 col-sm-4">
				
				<div id="owl-example" class="owl-carousel owl-theme">
					<?php
							
						include('../PHP/connexion.php');

							$sql = "SELECT a.*
								FROM projets AS a
								LEFT JOIN projets AS a2
								ON a.ID_parcours = a2.ID_parcours AND a.Date <= a2.Date
								GROUP BY a.ID_projets
								HAVING COUNT(*) <= 2
								ORDER BY a.ID_parcours, a.Date DESC, a.Poids DESC";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								echo "<div class='item'>
										<a href='projet.php?projetID=".utf8_encode($row["ID_projets"])."'>
											<img src='". utf8_encode($row["Miniature"]) ."'alt='".utf8_encode($row["Nom"])."'>
										</a>
									</div>";
								}
							} else {
								 echo "0 results";
							}

						include('../PHP/deconnexion.php');

					?> 
				</div>
				
			</div>
		</div>
	</body>

	<footer>

	</footer>

</html>