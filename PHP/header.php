<div>
	<h1 class="banner">Licence Professionelle Image & Son</h1>
	<img class= "bannerlogo"src="./Images/logoIUT.jpeg"/>
	<?php

		include('./PHP/connexion.php');

		$sql = "SELECT * FROM promotions, anneescolaire WHERE promotions.ID_Annee = anneescolaire.ID_Annee ORDER BY anneescolaire.DateDebut DESC LIMIT 1";
		$result = $conn->query($sql);

		$imagesize = getimagesize("./Images/logoIUT.jpeg");
		$height = $imagesize[1];

		//var_dump($height);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			echo "<img class= 'bannerpic' src='".utf8_encode($row["Lien"])."'/>";
			}
		} else {
			 echo "0 results";
		}
		
		include('./PHP/deconnexion.php');

	?>
	
</div>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Accueil</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" href="parcours.php">Parcours</a>
				
				<ul class="dropdown-menu">
					<?php

						include('./PHP/connexion.php');

						$sql = "SELECT * FROM parcours";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
							echo "<li><a href='parcours.php#".utf8_encode($row["Nom"])."'>". utf8_encode($row["Nom"]) ."</a></li>";
							}
						} else {
							 echo "0 results";
						}
						
						include('./PHP/deconnexion.php');

					?>  
				</ul>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="parcours.html">Projets</a>
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
						} else {
							 echo "0 results";
						}

						include('./PHP/deconnexion.php');

					?>  
				</ul>
			</li>
			<li><a href='contact.php'>Contact</a></li>
		</ul>
	</div>
</nav>