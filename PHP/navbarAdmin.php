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
				<li class="active"><a href="menu.php">Accueil</a></li>
				<?php 
					switch ($user_statut) {
						case 'etudiant':
							echo "<li><a href='profil.php'>Mon compte</a>
							</li>
							<li class='dropdown'>
								<a class='dropdown-toggle' data-toggle='dropdown' href=''>Projets</a>
								<ul class='dropdown-menu'>
									<li><a href='ajoutProjet.php'>Ajouter un projet</a></li>
									<li><a href='listeProjets.php'>Modifier un projet</a></li>
								</ul>
							</li>";
							break;
						
						case 'enseignant':
							echo "<li><a href='profil.php'>Mon compte</a>
							</li>
							<li class='dropdown'>
								<a class='dropdown-toggle' data-toggle='dropdown' href=''>Projets</a>
								<ul class='dropdown-menu'>
									<li><a href='ajoutProjet.php'>Ajouter un projet</a></li>
									<li><a href='listeProjets.php'>Modifier un projet</a></li>
								</ul>
							</li>
							<li class='dropdown'>
								<a class='dropdown-toggle' data-toggle='dropdown' href=''>Parcours</a>
								<ul class='dropdown-menu'>
									<li><a href='ajoutParcours.php'>Ajouter un parcours</a></li>
									<li><a href='listeParcours.php'>Modifier un parcours</a></li>
									<li><a href='ajoutReseauxSociaux.php'>Ajouter un réseau social a un parcours</a></li>
									<li><a href='listeReseau.php'>Modifier un réseau social</a></li>
								</ul>
							</li>
							<li class='dropdown'>
								<a class='dropdown-toggle' data-toggle='dropdown' href=''>Actualités</a>
								<ul class='dropdown-menu'>
									<li><a href='ajoutActu.php'>Ajouter une actualité</a></li>
									<li><a href='listeActu.php'>Modifier une actualité</a></li>
								</ul>
							</li>
							<li class='dropdown'>
								<a class='dropdown-toggle' data-toggle='dropdown' href=''>Année Scolaire</a>
								<ul class='dropdown-menu'>
									<li><a href='ajoutAnnee.php'>Ajouter une Année Scolaire</a></li>
									<li><a href='ajoutPromotion.php'>Ajouter une promotion</a></li>
								</ul>
							</li>";
							break;
					}
				 ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../Administration/logout.php">Log out</a></li>
			</ul>
		</div>
	</div>
</nav>