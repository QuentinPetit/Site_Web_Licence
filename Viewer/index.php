<!DOCTYPE htm>

<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../CSS/style.css">
	</head>

	<header>
		<ul id="menu">
			<li><a href="index.html">Accueil</a></li>
			<li><a href="parcours.html">Parcours</a>
				<ul>
					<?php

						include('../PHP/connexion.php');

						$sql = "SELECT Nom FROM parcours";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
							echo "<li><a href='parcours.html'>". utf8_encode($row["Nom"]) ."</a></li>";
							}
						} else {
						     echo "0 results";
						}
						
						include('../PHP/deconnexion.php');

					?>  
				</ul>
			</li>
			<li><a href="parcours.html">Projets</a>
				<ul>
					<?php
						
						include('../PHP/connexion.php');

						$sql = "SELECT Nom FROM parcours";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
							echo "<li><a href='parcours.html'>". utf8_encode($row["Nom"]) ."</a></li>";
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
	</header>

	<body>
		<div class="actu">
			<?php
						
				include('../PHP/connexion.php');

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

				include('../PHP/deconnexion.php');

			?>  
		</div>
		<div class="actu">

						<div class="owl-wrapper-outer"><div style="width: 4180px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-418px, 0px, 0px);" class="owl-wrapper"><div style="width: 418px;" class="owl-item"><div class="item">	
							<div class="blog-box2">
								<figure>
									<img src="http://img0.mxstatic.com/wallpapers/44e535006cffbc1b6e41f72d5e9df1e4_large.jpeg" alt="image" class="img-responsive">
									<ul>
										<li><i class="fa fa-calendar"></i> <span>Jan 3, 2016</span></li>
										<li><i class="fa fa-comment"></i> <span>180</span></li>
									</ul>
								</figure>
								<h4>Snowy Forest</h4>
								<p> Lorem ipsum dolor sit amet Maecenas ullamcorper diam nec augue semper ...</p>		
								<a href="blog-single.html" class="link">Read more...</a>	
							</div>	
						</div></div><div style="width: 418px;" class="owl-item"><div class="item">	
							<div class="blog-box2">
								<figure>
									<img src="http://www.unesourisetmoi.info/wall32/images/paysage-fonds-ecran_04.jpg" alt="image" class="img-responsive">
									<ul>
										<li><i class="fa fa-calendar"></i> <span>Feb 16, 2016</span></li>
										<li><i class="fa fa-comment"></i> <span>16</span></li>
									</ul>
								</figure>
								<h4>Nice View</h4>
								<p> Lorem ipsum dolor sit amet Maecenas ullamcorper diam nec augue semper ...</p>		
								<a href="blog-single.html" class="link">Read more...</a>	
							</div>	
						</div></div><div style="width: 418px;" class="owl-item"><div class="item">	
							<div class="blog-box2">
								<figure>
									<img src="http://img0.mxstatic.com/wallpapers/bfbd89b2ff0e40a77fe4fb5c31cc877a_large.jpeg" alt="image" class="img-responsive">
									<ul>
										<li><i class="fa fa-calendar"></i> <span>March 8, 2016</span></li>
										<li><i class="fa fa-comment"></i> <span>280</span></li>
									</ul>
								</figure>
								<h4>Cool Waves</h4>
								<p> Lorem ipsum dolor sit amet Maecenas ullamcorper diam nec augue semper ...</p>		
								<a href="blog-single.html" class="link">Read more...</a>	
							</div>	
						</div></div><div style="width: 418px;" class="owl-item"><div class="item">	
							<div class="blog-box2">
								<figure>
									<img src="http://www.unesourisetmoi.info/data/images/photos/059/fonds-ecran-hd_paysages_09.jpg" alt="image" class="img-responsive">
									<ul>
										<li><i class="fa fa-calendar"></i> <span>April 11, 2016</span></li>
										<li><i class="fa fa-comment"></i> <span>95</span></li>
									</ul>
								</figure>
								<h4>Plane View</h4>
								<p> Lorem ipsum dolor sit amet Maecenas ullamcorper diam nec augue semper ...</p>		
								<a href="blog-single.html" class="link">Read more...</a>	
							</div>	
						</div></div><div style="width: 418px;" class="owl-item"><div class="item">	
							<div class="blog-box2">
								<figure>
									<img src="http://a397.idata.over-blog.com/3/64/44/21/gif-ou-image/paysage-asiatique.jpg" alt="image" class="img-responsive">
									<ul>
										<li><i class="fa fa-calendar"></i> <span>May 18, 2016</span></li>
										<li><i class="fa fa-comment"></i> <span>35</span></li>
									</ul>
								</figure>
								<h4>Skie Rides</h4>
								<p> Lorem ipsum dolor sit amet Maecenas ullamcorper diam nec augue semper ...</p>		
								<a href="blog-single.html" class="link">Read more...</a>	
							</div>	
						</div></div></div></div>
						
						
						
						
							

					<div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page"><span class=""></span></div><div class="owl-page active"><span class=""></span></div></div></div>
		</div>
	</body>

	<footer>

	</footer>

</html>