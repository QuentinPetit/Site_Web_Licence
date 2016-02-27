<!DOCTYPE htm>

<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../CSS/style.css">
		<link rel="stylesheet" type="text/css" href="../Ressources/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="../Ressources/owl-carousel/owl.theme.css">
		<link rel="stylesheet" type="text/css" href="../Ressources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="../Ressources/owl-carousel/owl.carousel.js"></script>
		<script type="text/javascript" src="../Ressources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
 
			  var time = 7; // time in seconds
			 
			  var $progressBar,
			      $bar, 
			      $elem, 
			      isPause, 
			      tick,
			      percentTime;
			 
			    //Init the carousel
			    $("#owl-example").owlCarousel({
			      slideSpeed : 500,
			      paginationSpeed : 500,
			      singleItem : true,
			      afterInit : progressBar,
			      afterMove : moved,
			      startDragging : pauseOnDragging
			    });
			 
			    //Init progressBar where elem is $("#owl-example")
			    function progressBar(elem){
			      $elem = elem;
			      //build progress bar elements
			      buildProgressBar();
			      //start counting
			      start();
			    }
			 
			    //create div#progressBar and div#bar then prepend to $("#owl-example")
			    function buildProgressBar(){
			      $progressBar = $("<div>",{
			        id:"progressBar"
			      });
			      $bar = $("<div>",{
			        id:"bar"
			      });
			      $progressBar.append($bar).prependTo($elem);
			    }
			 
			    function start() {
			      //reset timer
			      percentTime = 0;
			      isPause = false;
			      //run interval every 0.01 second
			      tick = setInterval(interval, 10);
			    };
			 
			    function interval() {
			      if(isPause === false){
			        percentTime += 1 / time;
			        $bar.css({
			           width: percentTime+"%"
			         });
			        //if percentTime is equal or greater than 100
			        if(percentTime >= 100){
			          //slide to next item 
			          $elem.trigger('owl.next')
			        }
			      }
			    }
			    //pause while dragging 
			    function pauseOnDragging(){
			      isPause = true;
			    }
			 
			    //moved callback
			    function moved(){
			      //clear interval
			      clearTimeout(tick);
			      //start again
			      start();
			    }
			    //uncomment this to make pause on mouseover 
			    $elem.on('mouseover',function(){
			      isPause = true;
			    })
			    $elem.on('mouseout',function(){
			      isPause = false;
			    })
		});


	    /*$(document).ready(function() {
	     
	      $("#owl-demo").owlCarousel({
	     
	          autoPlay: 3000, //Set AutoPlay to 3 seconds
	     
	          items : 4,
	          itemsDesktop : [1199,3],
	          itemsDesktopSmall : [979,3]
	     
	      });
	     
	    });*/


		</script>
	</head>

	<header>
		<div>
			<img src="../Pictures/logo.png"/>
			<img src="../Pictures/worker.jpg"/>
		</div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Accueil</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="parcours.html">Parcours</a>
						
						<ul class="dropdown-menu">
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
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="parcours.html">Projets</a>
						<ul class="dropdown-menu">
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
			</div>
		</nav>
	</header>

	<body>
		<div class="row">
			<div class="actu col-xs-12 col-md-8 well">
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
			<div class="actu col-xs-12 col-md-4">
				
				<div id="owl-example" class="owl-carousel owl-theme">
					<?php
							
					include('../PHP/connexion.php');

						$sql = "SELECT Miniature FROM projets ORDER BY Date DESC LIMIT 2";
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
					<div class="item"><img src="../Pictures/0b4f995a.jpg" alt="Owl Image"></div>
					<div class="item"><img src="../Pictures/1d3878a9.jpg" alt="Owl Image"></div>
					<div class="item"><img src="../Pictures/136c27e7.jpg" alt="Owl Image"></div>
					<div class="item"><img src="../Pictures/apk0duvhadivsgm9htgfsqkavtfce0gv75apectsa7ivpnotldxefyjpayzkjk6rqoxybietolzo2hsb3f7leiw3sfaug_mk5ljjmdwnsi55bgrqbbuakzf8z8czmiih8.jpg" alt="Owl Image"></div>
					<div class="item"><img src="../Pictures/c7d064d4.jpg" alt="Owl Image"></div>
					<div class="item"><img src="../Pictures/croatie-lacs-plitvice-cascades-7.jpg" alt="Owl Image"></div>
					<div class="item"><img src="../Pictures/d6ec1e3e9f_seychelles-45.jpg" alt="Owl Image"></div>
				</div>
				
			</div>
		</div>
	</body>

	<footer>

	</footer>

</html>