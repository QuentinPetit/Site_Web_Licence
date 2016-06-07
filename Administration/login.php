<!DOCTYPE html>
<html>
<head>
	<title>Administration Licence Pro</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../Ressources/BootstrapCustom/css/bootstrap.min.css">
	<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../JS/login.js"></script>
	<link type="text/css" rel="stylesheet" href="../CSS/style.css">	
</head>
<body>
<?php include('../PHP/connexion.php'); ?>
<?php 
	session_start();
	if (isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['name']) && !isset($_POST['firstName']) && !isset($_POST['confirm-password'])) {
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);

			$statut = $_POST['statut'];
			$table = null;

			switch ($statut) {
				case 'etudiant':
					$table = "eleves";
					break;
				case 'enseignant':
					$table = "administrateur";
					break;
			}
 
			$sql = "SELECT * FROM ".$table." WHERE UserName = '".$username."' AND Password = '".$password."'";
			$result=$conn->query($sql);
			$count = $result->num_rows;

			if($count == 1) {
				$_SESSION['login_user'] = $username;
				$_SESSION['statut'] = $statut;
				$_SESSION['userTable'] = $table;

				header("location: menu.php");
			} else {
				$error = "Votre mot de passe ou votre login est invalide.";
			}
		}
		if (isset($_POST['username']) && isset($_POST['name']) && isset($_POST['firstName']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$name = mysqli_real_escape_string($conn,$_POST['name']);
			$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);
			$confirmPassword = mysqli_real_escape_string($conn,$_POST['confirm-password']);
			if ($username!="" && $name!="" && $firstName!="" && $password!="" && $confirmPassword!="") {
				print_r($_POST);
				$statut = $_POST['statut'];
				$table = null;

				switch ($statut) {
					case 'etudiant':
						$table = "eleves";
						break;
					case 'enseignant':
						$table = "administrateur";
						break;
				}
				if ($password==$confirmPassword)
				{
					$sql = "SELECT * FROM ".$table." WHERE UserName = '".$username."'";
					$result=$conn->query($sql);
					$count = $result->num_rows;
					if ($count==0)
					{
						$sqlInsert = "INSERT INTO ".$table."(Nom, Prenom, UserName, Password) VALUES ('".$name."','".$firstName."','".$username."','".$password."')";
						if ($conn->query($sqlInsert) === TRUE) {
							$_SESSION['login_user'] = $username;
							$_SESSION['statut'] = $statut;
							$_SESSION['userTable'] = $table;
							if($statut = "etudiant")
							{
								mkdir("../Etudiants/".$name."_".$firstName."_".$username);
							}
							header("location: menu.php");
						} else {
						    $errorInsert = "Error: " . $sqlInsert . "<br>" . $conn->error;
						}
					} else {
						$errorInsert = "Un utilisateur possède déjà ce pseudonyme";
					}			
				} else {
					$errorInsert = "Le mot de passe et le mot de passe de confirmation sont différents";
				}

			} else {
				$errorInsert = "Il manque des données";
			}
		}
			
	?>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" maxlength="20">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" maxlength="10">
									</div>
									<div class="form-group">
										<div class="row">
											<label class="radio-inline"><input type="radio" name="statut" checked="true" value="etudiant">Étudiant</label>
											<label class="radio-inline"><input type="radio" name="statut"value="enseignant">Enseignant</label>
										</div>
									</div>
									<?php
										if (isset($error))
										{
											echo "<div class='alert alert-danger'>".$error."</div>"; 
										}
									?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" maxlength="20">
									</div>
									<div class="form-group">
										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Nom" maxlength="20">
									</div>
									<div class="form-group">
										<input type="text" name="firstName" id="firstName" tabindex="1" class="form-control" placeholder="Prénom" maxlength="20">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" maxlength="10">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" maxlength="10">
									</div>
									<div class="form-group">
										<div class="row">
											<label class="radio-inline"><input type="radio" name="statut" checked="true" value="etudiant">Étudiant</label>
											<label class="radio-inline"><input type="radio" name="statut"value="enseignant">Enseignant</label>
										</div>
									</div>
									<?php
										if (isset($errorInsert))
										{
											echo "<div class='alert alert-danger'>".$errorInsert."</div>"; 
										}
									?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('../PHP/deconnexion.php'); ?>
</body>
</html>