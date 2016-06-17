
<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$from = 'Demande de contact site web'; 
		$to = 'laura.fournel@udamail.fr'; 
		$subject = 'Message venant de votre site ';
		$errName;$errEmail;$errMessage;
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
		//setini(SMTP,'SMTPserver.iut.u-clermont1.fr');
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Veuillez saisir votre nom';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Veuillez entrer une adresse email valide';
		}
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Veuillez saisir votre message';
		}
		//echo $errName+" "+$errEmail+" "+$errMessage;
		// If there are no errors, send the email
		if (!isset($errName) && !isset($errEmail) && !isset($errMessage)) {
			if (mail ($to, $subject, $body, $from)) {
				$error="Votre demande a bien été envoyée";
			} else {
				$message="Désolés, nous n\'avons pas pû faire parvenir votre message, veuillez essayer plus tard, s\'il vous plaît";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
			<meta charset="UTF-8"/>
			<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="./Ressources/BootstrapCustom/css/bootstrap.min.css">
			<link type="text/css" rel="stylesheet" href="./CSS/style.css">
			<script type="text/javascript" src="./Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
			<script type="text/javascript" src="./Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
			<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBLXxfXzOpl5sEZIm_0w58AbupLMYtSAPU"></script>
			<script>
				var myCenter=new google.maps.LatLng(45.0401016,3.8806784);
				var marker;
				function initialize() {
					var mapProp = {
						center:myCenter,
						zoom:13,
						mapTypeId:google.maps.MapTypeId.HYBRID
					};
					var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
					var marker=new google.maps.Marker({
						position:myCenter,
						animation:google.maps.Animation.DROP
					});

					marker.setMap(map);
				}
				google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			<link type="text/css" rel="stylesheet" href="./CSS/customNavbar.css">
	</head>
	<header>
		<?php include('./PHP/header.php') ?>
	</header>
	<body>
		<div class="container-fluid" id="contactContainer">
			<div class="col-xs-12 col-md-4">
				<p>Coordonées secrétariat :</p>
				<ul>
					<li>Adresse : 3-5, rue Lashermes - CS 10219, 43006, Le Puy En Velay Cedex</li>
					<li>Téléphone : 04 71 09 90 88</li>
					<li>Fax : 04 71 09 90 78</li>
					<li>Email : laura.fournel@udamail.fr</li>
				</ul>
				<div id="googleMap" style="width: 450px;height: 350px;"></div>
			</div>

			<div class="col-xs-12 col-md-8">

				<form class="form-horizontal" role="form" method="post" action="contact.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Nom</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nom & Prénom">
							<?php if (isset($errName)) {
								echo "<p class='text-danger'>$errName</p>";
							}?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="dupontjean@gmail.com"> 
							<?php if(isset($errEmail)){
								echo "<p class='text-danger'>$errEmail</p>";
							}?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message" placeholder="Message"></textarea>
							<?php if (isset($errMessage)) {
								echo "<p class='text-danger'>$errMessage</p>";
							}?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Envoyer" class="btn btn-danger">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
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
						</div>
					</div>
				</form> 

			</div>
		</div>
	</body>
	<footer>
		
	</footer>
</html>