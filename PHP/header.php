
<div id="headerContainer" class="container-fluid">
	<div class="hidden-xs hidden-sm col-md-1">
		<img src="./Images/logoIUT.jpeg" class="img-responsive"/>
	</div>
	<div class="col-xs-12 col-md-7">
		<h1 id="headerTitle">Licence Professionelle Système Informatique & Logiciel - Image & Son</h1>
	</div>
	<div class="hidden-xs hidden-sm col-md-4">
		<?php

			include('./PHP/connexion.php');

			$sql = "SELECT * FROM promotions, anneescolaire WHERE promotions.ID_Annee = anneescolaire.ID_Annee ORDER BY anneescolaire.DateDebut DESC LIMIT 1";
			$result = $conn->query($sql);

			//var_dump($height);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				echo "<img src='".utf8_encode($row["Lien"])."' class='img-responsive'/>";
				}
			}
			
			include('./PHP/deconnexion.php');

		?>		
	</div>

</div>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span> 
		    </button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Accueil</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="">Projets</a>
					<ul class="dropdown-menu">
						<?php
							
							include('./PHP/connexion.php');

							$sql = "SELECT * FROM parcours";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								echo "<li><a href='projets.php?parcoursId=".utf8_encode($row["ID_parcours"])."'>". utf8_encode($row["Nom"]) ."</a></li>";
								}
							}

							include('./PHP/deconnexion.php');

						?>  
					</ul>
				</li>
				<li><a href='contact.php'>Contact</a></li>
			</ul>
		</div>
		
	</div>
</nav>