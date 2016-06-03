
<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$from = 'Demande de contact site web'; 
		$to = 'quentin43@sfr.fr'; 
		$subject = 'Message venant de votre site ';
		$errName;$errEmail;$errMessage;
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";

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
		echo $errName+" "+$errEmail+" "+$errMessage;
		// If there are no errors, send the email
		if (!$errName && !$errEmail && !$errMessage) {
			if (mail ($to, $subject, $body, $from)) {
				$result='<div class="alert alert-success">Votre demande a bien &eacutet&eacute envoy&eacutee</div>';
			} else {
				$result='<div class="alert alert-danger">D&eacutesol&eacutes, nous n\'avons pas pû faire parvenir votre message, veuillez essayer plus tard, s\'il vous plaît</div>';
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
			<link type="text/css" rel="stylesheet" href="./CSS/customNavbar.css">
	</head>
	<header>
		<?php include('./PHP/header.php') ?>
	</header>
	<body>
		<div class="row">
			<div class="col-xs-12 well">

				<form class="form-horizontal" role="form" method="post" action="contact.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Nom</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nom & Pr&eacutenom" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="dupontjean@gmail.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Envoyer" class="btn btn-danger">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>    
						</div>
					</div>
				</form> 

			</div>
		</div>
	</body>
	<footer>
		
	</footer>
</html>