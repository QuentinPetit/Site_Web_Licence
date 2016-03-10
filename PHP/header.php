<div>
	<img src="../Pictures/logo.png"/>
	<img src="../Pictures/worker.jpg"/>
</div>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Accueil</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" href="parcours.php">Parcours</a>
				
				<ul class="dropdown-menu">
					<?php

						include('../PHP/connexion.php');

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
						
						include('../PHP/deconnexion.php');

					?>  
				</ul>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="parcours.html">Projets</a>
				<ul class="dropdown-menu">
					<?php
						
						include('../PHP/connexion.php');

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

						include('../PHP/deconnexion.php');

					?>  
				</ul>
			</li>
			<li><a href='contact.html'>Contact</a></li>
		</ul>
	</div>
</nav>