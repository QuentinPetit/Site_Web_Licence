<!DOCTYPE html>
<html>
	<head>
		<title>Licence Professionnelle Image & Son</title>
		<meta charset="UTF-8"/>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans|Nunito' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="./Ressources/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="./Ressources/owl-carousel/owl.theme.css">
		<link rel="stylesheet" type="text/css" href="./Ressources/BootstrapCustom/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="./CSS/style.css">
		<link type="text/css" rel="stylesheet" href="./CSS/customNavbar.css">
		<script type="text/javascript" src="./Ressources/owl-carousel/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="./Ressources/owl-carousel/owl.carousel.js"></script>
		<script type="text/javascript" src="./Ressources/bootstrapCustom/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="./JS/customCaroussel.js"></script>
		<script type="text/javascript" src="./Ressources/three.js-master/examples/js/Detector.js"></script>
		<script type="text/javascript" src="./Ressources/three.js-master/build/three.js"></script>
		<script type="text/javascript" src="./Ressources/three.js-master/examples/js/loaders/OBJLoader.js"></script>
	    <script type="text/javascript" src="./Ressources/threeleapcontrols-master/js/leap.min.js"></script>
	    <script type="text/javascript" src="./Ressources/threeleapcontrols-master/LeapCameraControls.js"></script>
	    <script type="text/javascript" src="./Ressources/threeleapcontrols-master/LeapObjectControls.js"></script>


	</head>
	<header>
		<?php include('./PHP/header.php') ?>
	</header>

	<body>
		<div class="row">
			<div class="col-xs-12 well">
				<?php

					include('./PHP/connexion.php');

					$projetID = $_GET['projetID'];
					
					$sql = "SELECT * FROM projets WHERE projets.ID_projets =".$projetID; 
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<h1>".utf8_encode($row["Nom"])."</h1>";

							$sqldata = "SELECT projets.ID_projets, data.Lien, type.Type FROM projets, data, type 
							WHERE projets.ID_projets = data.ID_projets 
							AND type.ID_type = data.ID_type
							AND projets.ID_projets = '".$projetID."'ORDER BY type.Type DESC";
							$resultdata = $conn->query($sqldata);
							if ($resultdata->num_rows > 0) {
								echo"<div id='owl-projet' class='owl-carousel owl-theme'>";
								while ($rowdata = $resultdata->fetch_assoc()) {
									switch (utf8_encode($rowdata["Type"])) {
										case 'Image':
											echo "<div class='item'>
													<div class='centerAlign'>
														<img src='".utf8_encode($rowdata["Lien"])."'/>
													</div>
												</div>";
											break;

										case 'Vidéo MP4':
											echo "<div class='item'>
													<div align='center' class='embed-responsive embed-responsive-16by9' >
														<video class='embed-responsive-item' controls>
															<source src='".utf8_encode($rowdata["Lien"])."' type = 'video/mp4'>
														</video>
													</div>
												</div>";
											break;
										case 'Vidéo Youtube':
											echo "<div class='item'>
													<div class='video-container'>
														<iframe width='560' height='315' src='".utf8_encode($rowdata["Lien"])."' frameborder='0' allowfullscreen></iframe>
													</div>
												</div>";
											break;
										case 'Modélisation':
											?>
											<div class="item">
												<div class="centerAlign" id="objLoaderParent">
													<script type="text/javascript">
														var container;
														var camera, scene, renderer;
														var animRequest;
														var mouseX = 0, mouseY = 0;
														var windowHalfX = window.innerWidth/2;
														var windowHalfY = window.innerHeight/2;

														init();

														var controller = new Leap.Controller();

															Leap.loop(function(frame) {
													          // show cursor
													          //showCursor(frame);
													          console.log("LEAP LOOP, FRUIT LOOP");
															window.cancelAnimationFrame(animRequest);
													          // set correct camera control
													          //controlsIndex = focusObject(frame);
													          cameraControls.update(frame);
													          /*if (index == -1) {
													            cameraControls.update(frame);
													          } else {
													            objectsControls[index].update(frame);
													        };*/

													          // custom modifications (here: show coordinate system always on target and light movement)
													          coords1.position = cameraControls.target;
													          coords2.position = cameraControls.target;
													          coords3.position = cameraControls.target;
													          //light.position   = camera.position;

													          renderLeap();
													      });

															animate();

														controller.on('deviceDisconnected', function(){
															console.log("LeapMotion Disconnected");
															animate();
														});

														function init() {
															container = document.createElement('div');
															document.getElementById("objLoaderParent").appendChild(container);

															//camera
															camera = new THREE.PerspectiveCamera(45, window.innerWidth/window.innerHeight, 1, 10000);
													        camera.position.x = 500;
													        camera.position.y = 500;
													        camera.position.z = 500;
															var origin = new THREE.Vector3(0, 0, 0);
															camera.lookAt(origin);
															//Leap Motion Controls
															cameraControls = new THREE.LeapCameraControls(camera);

															cameraControls.rotateEnabled  = true;
															cameraControls.rotateSpeed    = 3;
															cameraControls.rotateHands    = 1;
															cameraControls.rotateFingers  = [2, 3];

															cameraControls.zoomEnabled    = true;
															cameraControls.zoomSpeed      = 6;
															cameraControls.zoomHands      = 1;
															cameraControls.zoomFingers    = [4, 5];
															cameraControls.zoomMin        = 50;
															cameraControls.zoomMax        = 2000;

															cameraControls.panEnabled     = true;
															cameraControls.panSpeed       = 2;
															cameraControls.panHands       = 2;
															cameraControls.panFingers     = [6, 12];
															cameraControls.panRightHanded = false;

															//scene

															scene = new THREE.Scene();

														    // camera target coordinate system
															coords1 = new THREE.ArrowHelper(new THREE.Vector3(1, 0, 0), origin, 75, 0xcccccc);
															coords2 = new THREE.ArrowHelper(new THREE.Vector3(0, 1, 0), origin, 75, 0xcccccc);
															coords3 = new THREE.ArrowHelper(new THREE.Vector3(0, 0, 1), origin, 75, 0xcccccc);
															scene.add(coords1);
															scene.add(coords2);
															scene.add(coords3);

													        // world coordinate system (thin dashed helping lines)
															var lineGeometry = new THREE.Geometry();
															var vertArray = lineGeometry.vertices;
															vertArray.push(new THREE.Vector3(1000, 0, 0), origin, new THREE.Vector3(0, 1000, 0), origin, new THREE.Vector3(0, 0, 1000));
															lineGeometry.computeLineDistances();
															var lineMaterial = new THREE.LineDashedMaterial({color: 0xcccccc, dashSize: 1, gapSize: 2});
															var coords = new THREE.Line(lineGeometry, lineMaterial);
															scene.add(coords);

															var ambient = new THREE.AmbientLight(0x101030);
															scene.add(ambient);

															var directionalLight = new THREE.DirectionalLight(0xffeedd);
															directionalLight.position.set(0,0,1);
															scene.add(directionalLight);

															//texture

															var manager = new THREE.LoadingManager();
															manager.onProgress = function (item,loaded,total){
																console.log(item,loaded,total);
															};

															var texture = new THREE.Texture();

															var onProgress = function(xhr) {
																if (xhr.lengthComputable) {
																	var percentComplete = xhr.loaded/xhr.total*100;
																	console.log(Math.round(percentComplete,2)+ '% downloaded');
																}
															};
															var onError = function (xhr) {};

															var loader = new THREE.ImageLoader(manager);
															loader.load('./Ressources/three.js-master/examples/textures/UV_Grid_Sm.jpg', function (image) {
																texture.image=image;
																texture.needsUpdate=true;
															});

															//model

															var loader = new THREE.OBJLoader(manager);
															loader.load('<?php echo utf8_encode($rowdata['Lien']) ?>', function(object) {
																object.traverse( function (child) {
																	if (child instanceof THREE.Mesh) {
																		child.material.map=texture;
																	}
																});
																object.position.y = -95;
																scene.add(object);
															}, onProgress, onError );

															renderer = new THREE.WebGLRenderer();
															renderer.setPixelRatio(window.devicePixelRatio);
															renderer.setSize(window.innerWidth,window.innerHeight);
															container.appendChild(renderer.domElement);

															document.addEventListener( 'mousemove', onDocumentMouseMove, false );
															//
															window.addEventListener( 'resize', onWindowResize, false );
														}
														function onWindowResize() {

															windowHalfX = window.innerWidth / 2;
															windowHalfY = window.innerHeight / 2;

															camera.aspect = window.innerWidth / window.innerHeight;
															camera.updateProjectionMatrix();

															renderer.setSize( window.innerWidth, window.innerHeight );

														}

														function onDocumentMouseMove( event ) {

															mouseX = ( event.clientX - windowHalfX ) / 2;
															mouseY = ( event.clientY - windowHalfY ) / 2;

														}

														//

														function animate() {

															animRequest=requestAnimationFrame( animate );
															render();

														}

														function render() {

															camera.position.x += ( mouseX - camera.position.x ) * .05;
															camera.position.y += ( - mouseY - camera.position.y ) * .05;

															camera.lookAt( scene.position );

															renderer.render( scene, camera );

														}

														function renderLeap() {
															renderer.render(scene, camera);
														};

												        

													</script>
												</div>
											</div>
											<?php
											break;
										default:
											echo "format non pris en charge";
											break;
									}
								}
								echo "</div>";
							} else {
								echo "0 data";
							}

							/*<div align='center' class='embed-responsive embed-responsive-16by9 videoplayer'>
								<video class='embed-responsive-item' controls>
									<source src='".utf8_encode($row["Video"])."' type = 'video/mp4'>
								</video>
							</div>*/
							echo"<div class='col-xs-12 well'>
							<h2>Description</h2>
							<p>".utf8_encode($row["Description"])."</p>
							<h2>Caractéristiques</h2>
							<p>".utf8_encode($row["Caracteristique"])."</p>
							</div>
							<div class='col-xs-12 well'>
								<h2>Participants</h2>
								";
								$sqleleves="SELECT eleves.Nom, eleves.Prenom, eleves.CV_visibility, eleves.CV_en_ligne FROM eleves, projets, elevestoprojet 
								WHERE projets.ID_projets = elevestoprojet.ID_projets 
								AND eleves.ID_eleves = elevestoprojet.ID_eleves 
								AND projets.ID_projets =".$projetID;
								$resulteeleves = $conn->query($sqleleves);
								if($resulteeleves->num_rows >0)
								{
									while ($roweleves = $resulteeleves->fetch_assoc()) {
										if ($roweleves["CV_visibility"] == 1) {
											echo"<a href='".utf8_encode($roweleves["CV_en_ligne"])."' target='_blank'>".utf8_encode($roweleves["Nom"])." ".utf8_encode($roweleves["Prenom"]).", </a>";
										} else {
											echo utf8_encode($roweleves["Nom"])." ".utf8_encode($roweleves["Prenom"]).", ";
										}
										
										
									}
								}
								echo "
							</div>
							<div>
								<div class='break col-xs-12 col-sm-8 well'>
									<h2>Hardware</h2>
									<p>".utf8_encode($row["Materiel"])."</p>
									<h2>Software</h2>
									<p>".utf8_encode($row["Logiciel"])."</p>
								</div>
								
								</div>
								<div class='break col-xs-12 col-sm-4'>
									<a class='btn btn-default' href=".utf8_encode($row["Fichier_Projet"]).">Télécharger le projet</a>
									<a class='btn btn-default' href=".utf8_encode($row["Lien"])." target='_blank'>Site du projet</a>
								</div>
							
							</div>";

						}
					} else {
						echo "0 results";
					}
					

					include('./PHP/deconnexion.php');

				?>
			</div>
		</div>
	</body>
</hmtl>