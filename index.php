<!DOCTYPE html>

<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="./Ressources/font-awesome-4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./Ressources/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="./Ressources/owl-carousel/owl.theme.css">
		<link rel="stylesheet" type="text/css" href="./Ressources/BootstrapCustom/css/bootstrap.min.css">
		<script type="text/javascript" src="./Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="./Ressources/owl-carousel/owl.carousel.js"></script>
		<script type="text/javascript" src="./Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
		<link type="text/css" rel="stylesheet" href="./CSS/customNavbar.css">
		<link type="text/css" rel="stylesheet" href="./CSS/style.css">		
		<script type="text/javascript" src="./JS/customCaroussel.js"></script>
	</head>

	<header>
		<?php include('./PHP/header.php') ?>
	</header>

	<body>
		<div class="container-fluid parallax1">
			<div class="actu col-xs-12 col-sm-8">
			<h1>Actualités</h1>
				<?php
							
					include('./PHP/connexion.php');

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

					include('./PHP/deconnexion.php');

				?>  
			</div>
			<div class="actu col-xs-12 col-sm-4">
				
				<div id="owl-index" class="owl-carousel owl-theme">
					<?php
							
						include('./PHP/connexion.php');

							$sql = "SELECT ID_parcours FROM parcours";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									$sqlprojets = "SELECT * 
												   FROM parcours, projets, projetstoparcours
												   WHERE parcours.ID_parcours = projetstoparcours.ID_parcours
												   AND projets.ID_projets = projetstoparcours.ID_projets
												   AND parcours.ID_parcours = ".$row["ID_parcours"]."
												   ORDER BY projets.Date DESC, projets.Poids DESC
												   LIMIT 2";
									$resultprojets = $conn->query($sqlprojets);
									if ($resultprojets->num_rows>0)
									{
										while($rowprojets = $resultprojets->fetch_assoc())
										{
											echo "<div class='item'>
												<a href='projet.php?projetID=".utf8_encode($rowprojets["ID_projets"])."'>
													<img src='". utf8_encode($rowprojets["Miniature"]) ."'alt='".utf8_encode($rowprojets["Nom"])."'>
												</a>
											</div>";
										}	
									}
								}
							} else {
								 echo "0 results";
							}

						include('./PHP/deconnexion.php');

					?> 
				</div>
				
			</div>

		</div>
		<div class="container-fluid parallax1">
			<div class="col-xs-12" id="Parcours">
				<h2>Parcours</h2>
				<?php 	
					include('./PHP/connexion.php');

					$sql = "SELECT * FROM parcours";
					$result = $conn->query($sql);
					$right = TRUE;
					if ($result->num_rows > 0){
						while ($row = $result->fetch_assoc()) {
							if ($right)
							{
								echo "<div class='row grayBackground'>
								<section class='col-xs-12 col-sm-6'>
								<img src='".utf8_encode($row["Mascotte"])."' class='img-responsive mascot'>
								</section>
								<section class='col-xs-12 col-sm-6' style='text-align: right;'> 
								<a name='".utf8_encode($row["Nom"])."' href='parcoursDetail.php?parcoursId=".utf8_encode($row["ID_parcours"])."'><h3>".utf8_encode($row["Nom"])."</h3></a>
								<p>".utf8_encode($row["Description"])."</p>
								<a class='btn btn-default' href=".utf8_encode($row["Plaquette"])." target='_blank'>Télécharger la plaquette</a>";
								$sqlreseausociaux = "SELECT * FROM reseausociaux WHERE ID_parcours = ".utf8_encode($row["ID_parcours"]);
								$resultreseausociaux = $conn->query($sqlreseausociaux);
								if ($resultreseausociaux->num_rows>0){
									while ($rowreseausociaux=$resultreseausociaux->fetch_assoc()) {
										echo "<a class='btn btn-lg btn-social-icon btn-".utf8_encode($rowreseausociaux["NomReseau"])."' href='".utf8_encode($rowreseausociaux["Lien"])."' target='_blank'><i class='fa fa-".utf8_encode($rowreseausociaux["NomReseau"])."'></i></a>";
									}
								}else{
									echo "0 result";
								}
								echo "</section>
								</div>";
								$right=FALSE;
							}
							elseif (!$right)
							{
								echo "<div class='row grayBackground'>
								<section class='col-xs-12 col-sm-6' style='text-align: left'> 
								<a name='".utf8_encode($row["Nom"])."' href='parcoursDetail.php?parcoursId=".utf8_encode($row["ID_parcours"])."'><h3>".utf8_encode($row["Nom"])."</h3></a>
								<p>".utf8_encode($row["Description"])."</p>
								<a class='btn btn-default' href=".utf8_encode($row["Plaquette"])." target='_blank'>Télécharger la plaquette</a>";
								$sqlreseausociaux = "SELECT * FROM reseausociaux WHERE ID_parcours = ".utf8_encode($row["ID_parcours"]);
								$resultreseausociaux = $conn->query($sqlreseausociaux);
								if ($resultreseausociaux->num_rows>0){
									while ($rowreseausociaux=$resultreseausociaux->fetch_assoc()) {
										echo "<a class='btn btn-lg btn-social-icon btn-".utf8_encode($rowreseausociaux["NomReseau"])."' href='".utf8_encode($rowreseausociaux["Lien"])."' target='_blank'><i class='fa fa-".utf8_encode($rowreseausociaux["NomReseau"])."'></i></a>";
									}
								}else{
									echo "0 result";
								}
								echo "</section>
								<section class='col-xs-12 col-sm-6'>
								<img src='".utf8_encode($row["Mascotte"])."' class='img-responsive mascot''>
								</section>
								</div>";
								$right=TRUE;
							}
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