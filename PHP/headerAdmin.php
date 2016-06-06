<div id="headerContainer" class="container-fluid">
	<div class="hidden-xs hidden-sm col-md-1">
		<img src="../Images/logoIUT.jpeg" class="img-responsive"/>
	</div>
	<div class="col-xs-12 col-md-7">
		<h1 id="headerTitle">Licence Professionelle Système Informatique & Logiciel - Image & Son</h1>
	</div>
	<div class="hidden-xs hidden-sm col-md-4">
		<?php

			include('../PHP/connexion.php');

			$sql = "SELECT * FROM promotions, anneescolaire WHERE promotions.ID_Annee = anneescolaire.ID_Annee ORDER BY anneescolaire.DateDebut DESC LIMIT 1";
			$result = $conn->query($sql);

			//var_dump($height);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				echo "<img src='.".utf8_encode($row["Lien"])."' class='img-responsive'/>";
				}
			} else {
				 echo "0 results";
			}
			
			include('../PHP/deconnexion.php');

		?>		
	</div>

</div>
