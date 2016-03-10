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
		<?php include('../PHP/header.php') ?>
	</header>
	<body>
		<div class="row">
			<div class="col-xs-12 well">
				<?php

					$parcoursId=$_GET['parcoursId'];
					$years;
					$init=false;
					include('../PHP/connexion.php');

					$sql="SELECT * FROM projets WHERE ID_parcours='".$parcoursId."'ORDER BY Date DESC, Poids DESC";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						echo"<section class='col-xs-12 well'>";
						while ($row = $result->fetch_assoc()) {
							if ($init==false) {
								$years = date("Y", strtotime($row["Date"]));
								echo "<h1>".$years."</h1>";
								$init=true;
							}
							if(date("Y", strtotime($row["Date"]))!=$years)
							{
								$years = date("Y", strtotime($row["Date"]));
								echo "</section>";
								echo"<section class='col-xs-12 well'>";
								echo "<h1>".$years."</h1>";
							}

							echo "
							<div class='picholder col-xs-4 col-sm-3 col-md-2'>
									<img class='fancypics' src='".utf8_encode($row["Miniature"])."'>
									<a href='projet.php?projetID=".utf8_encode($row["ID_projets"])."'>
										<div class='overlay'>
											<p class='text_box'>".utf8_encode($row["Nom"])."</p>
											<div class='star-rating'><input id='inner-rating' type='hidden' class='rating' data-readonly value='".$row["Poids"]."'></div>
										</div>
									</a>
							</div>";							
							
						} echo "</section>";
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