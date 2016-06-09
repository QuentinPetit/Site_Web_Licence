
<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil </title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../Ressources/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../Ressources/owl-carousel/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="../Ressources/BootstrapCustom/css/bootstrap.min.css">
	<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../Ressources/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="../Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
	<link type="text/css" rel="stylesheet" href="../CSS/customNavbar.css">
	<link type="text/css" rel="stylesheet" href="../CSS/style.css">	
	<script type="text/javascript" src="../JS/customCaroussel.js"></script>	
</head>
<header>
	<?php include('../PHP/headerAdmin.php') ?>
	<?php include('../PHP/navbarAdmin.php') ?>
</header>
<body>
	<?php include('../PHP/connexion.php'); ?>
	<h1>Bienvenue, <?php echo $user_login; ?> </h1>
	<div class="container-fluid">
			<div class="actu col-xs-12 col-sm-8">
			<h1>Actualités</h1>
				<?php
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
				?>  
			</div>
			<div class="actu col-xs-12 col-sm-4">
				
				<div id="owl-index" class="owl-carousel owl-theme">
					<?php
							$sql = "SELECT * FROM projets ORDER BY Date DESC LIMIT 10";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc())
								{
									echo "<div class='item'>
										<a href='../projet.php?projetID=".utf8_encode($row["ID_projets"])."'>
											<img src='.". utf8_encode($row["Miniature"]) ."'alt='".utf8_encode($row["Nom"])."'>
										</a>
									</div>";
								}	
							} else {
								 echo "0 results";
							}
					?> 
				</div>
			</div>
		</div>
		<?php include('../PHP/deconnexion.php'); ?> 
</body>
</html>