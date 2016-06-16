
<?php include('../PHP/session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajout d'actu</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../Ressources/BootstrapCustom/css/bootstrap.min.css">
	<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
	<link type="text/css" rel="stylesheet" href="../CSS/customNavbar.css">
	<link type="text/css" rel="stylesheet" href="../CSS/style.css">		
</head>
<header>
	<?php include('../PHP/headerAdmin.php') ?>
	<?php include('../PHP/navbarAdmin.php') ?>
</header>
<body>
  <?php include('../PHP/connexion.php'); ?>
  <?php 
  if (isset($_POST['submit']) &&
  	isset($_POST['titreActualite']) &&
  	isset($_POST['actualite'])) 
  {
  	if ($_POST['titreActualite']!="" &&
  		$_POST['actualite']!="") {
  	
  		$titreActualite = $_POST['titreActualite'];
  		$actualite = $_POST['actualite'];
  	
  		$sql="INSERT INTO actualites (DateCreation, Titre, Article) VALUES ('".date('Y-m-d')."', '".utf8_decode($titreActualite)."', '".utf8_decode($actualite)."');";
  		if($conn->query($sql) === TRUE){
  			$message="L'actualité a bien été rajoutée.";
  		} else {
  			$error="Une erreur s'est produite. Veuillez réessayer ultérieurement.";
  		}
  	}
  } 
  ?>
  <div class="container-fluid">
  	<div class="col-xs-12 col-md-8 col-md-offset-2">
  		<form action="ajoutActu.php" method="POST">
  			<h1>Ajouter une actualité</h1>
  			<?php
  			if (isset($error))
  			{
  				echo "<div class='alert alert-danger'>".$error."</div>"; 
  			}
  			if (isset($message)) 
  			{
  				echo "<div class='alert alert-success'>".$message."</div>";
  			}
  			?>


  			<div class="form-group">
  				<label>Titre de l'article</label>
  				<textarea class="form-control" name="titreActualite" maxlength="80" rows="1" placeholder="Intitulé de l'article (80 car. max)"></textarea>
  			</div>
  			<div class="form-group">
  				<label>Contenu de l'article</label>
  				<textarea class="form-control" name="actualite" maxlength="140" rows="3" placeholder="Message (140 car. max)"></textarea>
  			</div>
  			<button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
  		</form>
  	</div>
  </div>

  <?php include('../PHP/deconnexion.php'); ?>
</body>
</html>